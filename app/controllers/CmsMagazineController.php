<?php

class CmsMagazineController extends Controller
{
    
    public function indexAction($params)
    {
        if(!empty($params['id'])){
            $this->db->setVisible($params);
        }
        
        $this->set('magazineCollection', $this->db->getMagazines());
        
    }
    
    
    public function wizardAction($params)
    {

        if(!empty($params['submit']) && !empty($params['page'])){
            
            switch($params['page']){
                case 'index': 
                    //Add/Update data from index page
                    $id = $this->submitIndexView($params);
                    if(!empty($id)){
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$id, 'success', '#fragment-2');
                    }else{
                        $this->redirect('cms'.DS.'magazine', 'error', '#fragment-1');
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
                    
                    $response = $this->submitImpressumView($params);
                    if(!empty($response)){
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'success', '#fragment-4');
                    }else{
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'error', '#fragment-3');
                    }
                    break;
                case 'topicnumber':
                    $response = $this->submitTopicView($params);
                    if(!empty($response)){
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'success', '#fragment-5');
                    }else{
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['id'], 'error', '#fragment-4');
                    }
                    break;
                case 'editorsword':
                    $response = $this->submitWordView($params);
                    if(!empty($response)){
                        $this->redirect('cms'.DS.'magazine', 'success');
                    }else{
                        $this->redirect('cms'.DS.'magazine'.DS.'wizard'.$params['id'], 'error', '#fragment-5');
                    }
                    break;
                default: //error
                    $this->redirect('cms'.DS.'magazine', 'error');
            }
        }
        
        if(!empty($params['id'])){
            
            $this->set('magazine', $this->db->getMagazine($params));
        }
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getMagazineImage($params['id']);
        $topicImages = $this->db->getTopicImages($params['id']);
        if($this->db->deleteMagazine($params)){
            
            //If exist delete
            if(!empty($data)){
                $this->deleteImage($data['image_name'], 'magazine');
                $this->deleteImage('thumb-'.$data['image_name'], 'magazine');
                $this->deleteImage($data['header_image_name'], 'magazine');
                $this->deleteImage($data['word_image_name'], 'magazine');
                $this->deleteImage('thumb-'.$data['word_image_name'], 'magazine');
            }
            //Delete topic images if exist
            if(!empty($topicImages)){
                foreach($topicImages as $tImage){
                   $this->deleteImage($tImage['image_name'], 'magazine'); 
                }
            }
            
            $this->redirect ('cms'.DS.'magazine', 'success');
        }else{
            $this->redirect ('cms'.DS.'magazine', 'error');
        }
    }
    
    /**
     * Getting whole form via Ajax - reposnse: html
     * @param type $params 
     */
    public function topicFormAction($params)
    {

        $response = $this->db->topicForm($params);
        $this->set('topic', $response);
    }
    
    /**
     * Delete form
     * @param type $params 
     */
    public function topicFormDeleteAction($params)
    {
        //Get image name if exist
        $response = $this->db->topicFormGetImage($params['id']);
        
        if($this->db->topicFormDelete($params)){
            //Remove image from folder
            if(!empty($response['image_name'])){
                $this->deleteImage($response['image_name'], 'magazine');
            }
            
            $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['magazine_id'], 'success', '#fragment-4');
        }
    }
    
    /**
     * Submit form
     * @param type $params 
     */
    public function topicFormSubmitAction($params)
    {
        
        if(!empty($params['submit'])){
            if($id = $this->db->topicFormSubmit($params['id'], $params['magazine_id'], $params['topic'])){
                
                //if file set upload it
                if(!empty($params['image']) && 0 == $params['image']['error']){
                    $imageName = $id.'-topic-'.$params['image']['name'];
                    $this->db->topicFormSetImage($id, $imageName);

                    $this->uploadImage($imageName, $params['image'], 'magazine');
                }
                $this->redirect('cms'.DS.'magazine'.DS.'wizard'.DS.$params['magazine_id'], 'success', '#fragment-4');
            }
        }
    }
    
    /**
     * Delete image from form via Ajax - reposnse: json
     * @param type $params 
     */
    public function topicFormDeleteImageAction($params)
    {
        //Get image name if exist
        $response = $this->db->topicFormGetImage($params['id']);
        
        if($this->db->topicFormSetImage($params['id'], '')){
            //Remove image from folder
            $this->deleteImage($response['image_name'], 'magazine');
            
            echo json_encode(array('response'=>true));
        }else{
            echo json_encode(array('response'=>false));
        }
    }
    
    
    public function wordDeleteImageAction($params)
    {
        //Get image name if exist
        $response = $this->db->getMagazineImage($params['id']);
        
        if($this->db->setImage($params['id'], '', 'word_image_name')){
            //Remove image from folder
            $this->deleteImage($response['word_image_name'], 'magazine');
            $this->deleteImage('thumb-'.$response['word_image_name'], 'magazine');
            echo json_encode(array('response'=>true));
        }else{
            echo json_encode(array('response'=>false));
        }
    }
    
    
    private function submitIndexView($params)
    {
        //Save data in db
        $id = $this->db->submitIndex($params['magazine']);
        if(!empty($id)){
            $images = $this->db->getMagazineImage($id);
            
            //Store image x2
            if(0 == $params['image']['error']){
                //Check if exists
                if(!empty($images['image_name'])){
                    $this->deleteImage($images['image_name'], 'magazine');
                    $this->deleteImage('thumb-'.$images['image_name'], 'magazine');
                }
                
                $newImageName = $id.'-'.$params['image']['name'];
                $this->db->setImage($id, $newImageName, 'image_name');
                
                $this->uploadImage($newImageName, $params['image'], 'magazine');
                $this->createThumbImage($newImageName, 'magazine', 95, 95);
            }
            
            if(0 == $params['header_image']['error']){
                //Check if exists
                if(!empty($images['header_image_name'])){
                    $this->deleteImage($images['header_image_name'], 'magazine');
                }
                
                $newImageName = $id.'-header-'.$params['header_image']['name'];
                $this->db->setImage($id, $newImageName, 'header_image_name');

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
    
    private function submitTopicView($params)
    {
        
        return $this->db->submitTopic($params);
    }
    
    private function submitWordView($params)
    {
        
        //Save data in db
        $id = $this->db->submitWord($params);
        
        if(!empty($id)){
            $images = $this->db->getMagazineImage($id);
            
            //Store image x2
            if(!empty($params['image']) && 0 == $params['image']['error']){
                //Check if exists
                if(!empty($images['word_image_name'])){
                    $this->deleteImage($images['word_image_name'], 'magazine');
                }
                
                $newImageName = $id.'-word-'.$params['image']['name'];
                $this->db->setImage($id, $newImageName, 'word_image_name');
                
                $this->uploadImage($newImageName, $params['image'], 'magazine');
                $this->createThumbImage($newImageName, 'magazine', 95, 95);
            }
            
            return $id;
        }else{
            
            return false;
        }
    }
    
    
}