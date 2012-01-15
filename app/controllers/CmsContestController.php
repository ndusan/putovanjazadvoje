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
                }
                
                $newImageName = $id.'-'.$params['image']['name'];
                $this->db->setImage($id, $newImageName, 'image_name');
                
                $this->uploadImage($newImageName, $params['image'], 'contest');
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
}

