<?php

class CmsMagazineController extends Controller
{
    
    public function indexAction($params)
    {
        
        $this->set('magazineCollection', $this->db->getMagazines());
    }
    
    
    public function wizardAction($params)
    {

        if(!empty($params['submit']) && !empty($params['page'])){
            
            switch($params['page']){
                case 'index':
                    
                    $id = $this->submitIndexView($params);
                    if(!empty($id)){
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$id, 'success', '#fragment-2');
                    }else{
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard', 'error', '#fragment-1');
                    }
                    break;
                case 'content':
                    
                    $response = $this->submitContentView($params);
                    if(!empty($response)){
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'success', '#fragment-3');
                    }else{
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'error', '#fragment-2');
                    }
                    break;
                case 'impressum':
                    //Get topic colleciton if exist
                    $this->set('topicCollection', $this->db->getAllTopicForms($params));
                    
                    $response = $this->submitImpressumView($params);
                    if(!empty($response)){
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'success', '#fragment-4');
                    }else{
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'error', '#fragment-3');
                    }
                    break;
            }
        }
        
        if(!empty($params['id'])){
            
            $this->set('magazine', $this->db->getMagazine($params));
        }
    }
    
    
    
    public function topicFormAction($params)
    {
        
        if(!empty($params['id']) && !empty($parmas['magazine_id']) && !empty($params['submit'])){
            if($this->db->topicFormSubmit($params)){

                $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['magazine_id'], 'success', '#fragment-4');
            }
        }else{
            
            $this->db->topicForm($params);
        }
    }
    
    public function topicFormDeleteAction($params)
    {
        
        if($this->db->topicFormDelete($params)){
            $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['magazine_id'], 'success', '#fragment-4');
        }
    }
    
    
    
    private function submitIndexView($params)
    {
        //Save data in db
        $id = $this->db->submitIndex($params['magazine']);
        if(!empty($id)){
            $images = $this->db->getMagazine(array('id'=>$id));
            
            //Store image x2
            if(0 == $params['image']['error']){
                //Check if exists
                if(!empty($images['image_name'])){
                    $this->deleteImage($images['image_name'], 'magazine');
                }
                
                $newImageName = $id.'-'.$params['image']['name'];
                $this->db->setIndexImage($id, $newImageName, 'image_name');
                
                $this->uploadImage($newImageName, $params['image'], 'magazine');
            }
            
            if(0 == $params['header_image']['error']){
                //Check if exists
                if(!empty($images['header_image_name'])){
                    $this->deleteImage($images['header_image_name'], 'magazine');
                }
                
                $newImageName = $id.'-header-'.$params['header_image']['name'];
                $this->db->setIndexImage($id, $newImageName, 'header_image_name');

                $this->uploadImage($newImageName, $params['header_image'], 'magazine');
            }
            
            return $id;
        }else{
            
            return false;
        }
    }
    
    
    
    private function submitContentView($params)
    {
        
        return $this->db->submitContent($params);
    }
    
    
    private function submitImpressumView($params)
    {
        
        return $this->db->submitImpressum($params);
    }
    
    
    
}