<?php

class CmsBackgroundController extends Controller
{
    
    public function indexAction($params)
    {
        
        if(!empty($params['id'])){
            parent::setRenderHTML(0);
            
            $this->db->setActive($params['id'], $params['active']);
            
            return true;
        }
        
        parent::set('backgroundCollection', $this->db->findAll());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->create($params['background'])){
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    
                    $this->db->setImageName($id, $newImageName);
                    $info = $this->uploadImage($newImageName, $params['image'], 'background');
                    
                }
                parent::redirect ('cms'.DS.'background', 'success');
            }else{
                parent::redirect ('cms'.DS.'background'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->update($params['background'])){
                //If image uploaded add it
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['background']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['background']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['background']['id'], $newImageName);
                    
                    $info = $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'background');
                }
                parent::redirect ('cms'.DS.'background', 'success');
            }else{
                parent::redirect ('cms'.DS.'background'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        parent::set('background', $this->db->find($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->delete($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'background');
                
            }
            parent::redirect ('cms'.DS.'background', 'success');
        }else{
            parent::redirect ('cms'.DS.'background', 'error');
        }
    }
    
    
}