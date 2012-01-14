<?php

class CmsContestController extends Controller
{

    public function indexAction($params)
    {
        
        if(!empty($params['id'])){
            $this->db->setVisible($params);
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
                       $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'success', 'fragment-4'); 
                    }else{
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'error', 'fragment-3'); 
                    }
                    break;
                case 'prizes':
                    
                    $response = $this->submitPrizesView($params);
                    if($response){
                        
                       $this->redirect('cms'.DS.'contest'.DS, 'success'); 
                    }else{
                        
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'error', 'fragment-4'); 
                    }
                    break;
            }
        }
        
        if(!empty($params['id'])){
            $this->set('contest', $this->db->getContest($params));
            $this->set('magazineCollection', $this->db->getAllMagazine());
        }
    }
    
    public function wizardPrizeFormAction($params)
    {
        
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
                
                $newImageName = $id.'-'.$params['puzzle_image']['name'];
                $this->db->setImage($id, $newImageName, 'puzzle_image_name');
                
                $this->uploadImage($newImageName, $params['puzzle_image'], 'contest');
            }
        }
    }
    
    private function submitPrizesView($params)
    {
        
        if($this->db->submitPrizes($params)){
                
            return true;
        }else{
            
            return false;
        }
    }
}
