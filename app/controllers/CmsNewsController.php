<?php

class CmsNewsController extends Controller
{
    
    public function indexAction($params)
    {
        $this->set('newsCollection', $this->db->findAllNews());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->createNews($params['news'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    $this->db->setImageName($id, $newImageName);
                    $this->uploadImage($newImageName, $params['image'], 'news');
                    
                    //Create thumb
                    $this->createThumbImage($newImageName, 'news', 200, 95);
                }
                $this->redirect ('cms'.DS.'news', 'success');
            }else{
                $this->redirect ('cms'.DS.'news'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateNews($params['news'])){
                //If image uploaded add it
                
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['news']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['news']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['news']['id'], $newImageName);
                    $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'news');
                    
                    //Delete thumb
                    $oldThumbImageName = 'thumb-'.$oldImageName;
                    $this->deleteImage($oldThumbImageName, 'news');
                    //Create thumb
                    $this->createThumbImage($newImageName, 'news', 200, 95);
                }
                $this->redirect ('cms'.DS.'news', 'success');
            }else{
                $this->redirect ('cms'.DS.'news'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        $this->set('news', $this->db->findNews($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteNews($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'news');
            }
            $this->redirect ('cms'.DS.'news', 'success');
        }else{
            $this->redirect ('cms'.DS.'news', 'error');
        }
    }
    
    public function deleteImageAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);

        //If exist delete
        if(!empty($data)){
            
            $this->db->setImageName($params['id'], '');
            $this->deleteImage($data['image_name'], 'news');
            
            //Delete thumb
            $oldThumbImageName = 'thumb-'.$data['image_name'];
            $this->deleteImage($oldThumbImageName, 'news');
        }
        $this->redirect ('cms'.DS.'news'.DS.'edit'.DS.$params['id'], 'success');
    }
    
}