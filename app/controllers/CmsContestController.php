<?php

class CmsContestController extends Controller
{

    public function indexAction($params)
    {
        
        if(!empty($params['id']) && !empty($params['status'])){
            $this->setRenderHTML(0);
            
            $this->db->setStatus($params);
            echo true;
        }
        
        $this->set('contestCollection', $this->db->getContests());
    }


    public function wizardAction($params)
    {
        
        if(!empty($params['submit']) && !empty($params['page'])){
            
            switch($params['page']){
                case 'init':
                    $id = $this->submitInitView($params);
                    if(!empty($id)){
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$id, 'success', '#fragment-1');
                    }else{
                        $this->redirect('cms'.DS.'contest', 'error');
                    }
                    break;
                case 'conditions':
                    $response = $this->submitConditionsView($params);
                    if($response){
                       $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'success', '#fragment-3'); 
                    }else{
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'error', '#fragment-2'); 
                    }
                    break; 
                case 'description':
                    $response = $this->submitDescriptionView($params);
                    if($response){
                       $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'success', '#fragment-4'); 
                    }else{
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'error', '#fragment-3'); 
                    }
                    break;
            }
        }
        
        if(!empty($params['id'])){
            $this->set('contest', $this->db->getContest($params));
        }
        $this->set('magazineCollection', $this->db->getAllMagazine());
        $this->set('sponsorCollection', $this->db->findAllSponsors());
    }
    
    public function wizardPrizeFormAction($params)
    {
        $response = $this->db->prizeForm($params);
        $this->set('prize', $response);
    }
    
    
    public function wizardPrizeFormSubmitAction($params)
    {
        
        if(!empty($params['submit'])){
            if($id = $this->db->wizardPrizeFormSubmit($params['id'], $params['contest_id'], $params['prize'])){
                
                //if file set upload it
                if(!empty($params['prize_image']) && 0 == $params['prize_image']['error']){
                    $imageName = $id.'-prize-'.$params['prize_image']['name'];
                    $this->db->wizardPrizeSetImage($id, $imageName);

                    $this->uploadImage($imageName, $params['prize_image'], 'contest');
                }
                $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['contest_id'], 'success', '#fragment-4');
            }
        }
    }
    
    
    public function wizardPrizeFormDeleteImageAction($params)
    {
        //Get image name if exist
        $response = $this->db->wizardPriceFormGetImage($params['id']);
        
        if($this->db->wizardPrizeSetImage($params['id'], '')){
            //Remove image from folder
            $this->deleteImage($response['image_name'], 'contest');
            
            echo json_encode(array('response'=>true));
        }else{
            echo json_encode(array('response'=>false));
        }
    }
    
    
    
    public function wizardPrizeFormDeleteAction($params)
    {
        //Get image name if exist
        $response = $this->db->wizardPriceFormGetImage($params['id']);
        
        if($this->db->wizardPrizeFormDelete($params)){
            //Remove image from folder
            if(!empty($response['image_name'])){
                $this->deleteImage($response['image_name'], 'contest');
            }
            
            $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['contest_id'], 'success', '#fragment-4');
        }
    }
    
    
    private function submitInitView($params)
    {
        
        $id = $this->db->submitInit($params['contest']);
        if(!empty($id)){
            $images = $this->db->getImages($id);
            
            if(0 == $params['image']['error']){
                //Check if exists
                if(!empty($images['image_name'])){
                    $this->deleteImage($images['image_name'], 'contest');
                    $this->deleteImage('thumb-'.$images['image_name'], 'contest');
                }
                
                $newImageName = $id.'-'.$params['image']['name'];
                $this->db->setImage($id, $newImageName, 'image_name');
                
                $this->uploadImage($newImageName, $params['image'], 'contest');
                
                //Create thumb
                $this->createThumbImage($newImageName, 'contest', 100, 100);
            }
            
            return $id;
        }
    }
    
    private function submitConditionsView($params)
    {
        
        return $this->db->submitConditions($params);
    }
    
    private function submitDescriptionView($params)
    {
        
        if($this->db->submitDescription($params)){
            
            //Update image
            $images = $this->db->getImages($params['id']);
            
            if(0 == $params['puzzle_image']['error']){
                //Check if exists
                if(!empty($images['puzzle_image_name'])){
                    $this->deleteImage($images['puzzle_image_name'], 'contest');
                }
                
                $newImageName = $params['id'].'-puzzle-'.$params['puzzle_image']['name'];
                $this->db->setImage($params['id'], $newImageName, 'puzzle_image_name');
                
                $this->uploadImage($newImageName, $params['puzzle_image'], 'contest');
            }
            
            return true;
        }
    }
    
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImages($params['id']);
        $wizardImages = $this->db->wizardPriceFormGetImages($params['id']);
        
        if($this->db->deleteContest($params)){
            
            //If exist delete
            if(!empty($data)){
                $this->deleteImage($data['image_name'], 'contest');
                $this->deleteImage($data['puzzle_image_name'], 'contest');
                $this->deleteImage($data['winner_image_name'], 'contest');
            }
            //Delete topic images if exist
            if(!empty($wizardImages)){
                foreach($wizardImages as $tImage){
                   $this->deleteImage($tImage['image_name'], 'contest'); 
                }
            }
            
            $this->redirect ('cms'.DS.'contest', 'success');
        }else{
            $this->redirect ('cms'.DS.'contest', 'error');
        }
    }
    
    
    public function winnersAction($params)
    {
        if(!empty($params['submit'])){
            $this->db->setWinners($params);
            
            if(0 == $params['winner_image']['error']){
                //Check if exists
                if(!empty($images['winner_image_name'])){
                    $this->deleteImage($images['winner_image_name'], 'contest');
                }
                
                $newImageName = $params['id'].'-winner-'.$params['winner_image']['name'];
                $this->db->setImage($params['id'], $newImageName, 'winner_image_name');
                
                $this->uploadImage($newImageName, $params['winner_image'], 'contest');
            }
            $this->redirect ('cms'.DS.'contest', 'success');
        }
        
        $this->set('prizesCollection', $this->db->getPrizes($params));
    }
    
    
    public function winnerDeleteImageAction($params)
    {
        //Get image name if exist
        $response = $this->db->getImages($params['id']);
        
        if($this->db->setImage($params['id'], '', 'winner_image_name')){
            //Remove image from folder
            $this->deleteImage($response['winner_image_name'], 'contest');
            
            echo json_encode(array('response'=>true));
        }else{
            echo json_encode(array('response'=>false));
        }
    }
    
    
    public function playersAction($params)
    {
        $this->set('playerCollection', $this->db->getPlayers($params));
    }
    
    public function exportAction($params)
    {
        
        $response = $this->db->getPlayers($params);
        
        //Add header
        $output = 'Firstname,Lastname,Email,Sex,Address,Status,Created';
        $output.= "\n";
        foreach($response as $r){
            $output.= $r['firstname'].','.$r['lastname'].','.$r['email'].','.$r['sex'].','.$r['address'].','.($r['closed']?'Closed':'Active').','.$r['created'];
            $output.= "\n";
        }
        
        // Output to browser with appropriate mime type, you choose ;)
	header("Content-type: text/x-csv");
	//header("Content-type: text/csv");
	//header("Content-type: application/csv");
	header("Content-Disposition: attachment; filename=search_results.csv");
	
        echo $output;
	exit;
    }
    
    
    public function sponsorsAction($params)
    {
        $this->set('sponsorCollection', $this->db->findAllSponsors());
    }
    
    public function addSponsorAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createSponsor($params['sponsor'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setSponsorImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'sponsors');
                    
                    //Create thumb
                    $this->createThumbImageAccordingToWidth($newImageName, 'sponsors', 230);
                }
                $this->redirect ('cms'.DS.'sponsors', 'success');
            }else{
                $this->redirect ('cms'.DS.'sponsors'.DS.'add', 'error');
            }
        }
    }
    
    public function editSponsorAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->updateSponsor($params['sponsor'])){
                if(0 == $params['image']['error']){

                    $data = $this->db->getSponsorImageName($params['sponsor']['id']);
                    $oldImageName = $data['image_name'];

                    $newImageName = $params['sponsor']['id'].'-'.$params['image']['name'];
                    $this->db->setSponsorImageName($params['sponsor']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'sponsors');

                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    $this->deleteImage($oldThumbImageName, 'sponsors');
                    //Create thumb
                    $this->createThumbImageAccordingToWidth($newImageName, 'sponsors', 230);
                }
                $this->redirect ('cms'.DS.'sponsors', 'success');
            }
        }
        $this->set('sponsor', $this->db->findSponsor($params['id']));
    }
    
    public function deleteSponsorAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getSponsorImageName($params['id']);
        if($this->db->deleteSponsor($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'sponsors');
                
                //Delete thumb
                $oldThumbImageName = 'thumb-'.$data['image_name'];
                $this->deleteImage($oldThumbImageName, 'sponsors');
            }
            $this->redirect ('cms'.DS.'sponsors', 'success');
        }else{
            $this->redirect ('cms'.DS.'sponsors', 'error');
        }
    }
    
    public function visibleSponsorAction($params)
    {
        $this->setRenderHTML(0);
        
        $this->db->visibleSponsor($params);
            
        return true;
    }
}

