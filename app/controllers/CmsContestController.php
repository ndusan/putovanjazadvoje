<?php

class CmsContestController extends Controller
{

    public function wizardAction($params)
    {
        
        if(!empty($params['submit']) && !empty($params['page'])){
            
            switch($params['page']){
                case 'init':
                    
                    $response = $this->submitInitView($params);
                    if($response){
                        
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$response, 'success', 'fragment-2');
                    }else{
                        
                        $this->redirect('cms'.DS.'contest'.DS.'wizard', 'error', 'fragment-1');
                    }
                    
                    break;
                case 'conditions':
                    
                    $response = $this->submitConditionsView($params);
                    if($response){
                        
                       $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'success', 'fragment-3'); 
                    }else{
                        
                        $this->redirect('cms'.DS.'contest'.DS.'wizard'.DS.$params['id'], 'error', 'fragment-2'); 
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
            
            //Get data into one array
            
            $this->set('dataCollection', $this->db->getContest($params['id']));
        }
        
        $this->set('magazineCollection', $this->db->getAllMagazine());
        
    }
    
    public function wizardPrizeFormAction($params)
    {
        
    }
    
    
    private function submitInitView($params)
    {
        
        if($id = $this->db->submitInit($params)){
            
            return $id;
        }else{
            
            return false;
        }
    }
    
    private function submitConditionsView($params)
    {
        
        if($this->db->submitConditions($params)){
                
            return true;
        }else{
            
            return false;
        }
    }
    
    private function submitDescriptionView($params)
    {
        
        if($this->db->submitDescription($params)){
                
            return true;
        }else{
            
            return false;
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
