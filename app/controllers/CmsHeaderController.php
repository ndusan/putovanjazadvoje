<?php

class CmsHeaderController extends Controller
{
    
    public function indexAction($params)
    {
        $this->set('headerCollection', $this->db->findAllHeaders());
    }
        
    public function addAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited
            if($id = $this->db->addHeader($params['header'])){
                
                if (!empty($id) && !empty($params['image']) && 0 == $params['image']['error']) {
                    
                    $imageName = $id.'-'.$params['image']['name'];
                    
                    $this->uploadImage($imageName, $params['image'], 'header');
                    
                    $this->db->setHeaderImageName($id, $imageName);
                }
                
                $this->redirect ('cms'.DS.'header', 'success');
            }else{
                $this->redirect ('cms'.DS.'header', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->editHeader($params['header'])){
                
                if (!empty($params['image']) && 0 == $params['image']['error']) {
                    
                    //Delete old image
                    $old = $this->db->getHeaderImageName($params['id']);
                    if( !empty($old)) {
                        $this->deleteimage($old['image_name'], 'header');
                    }
                    $imageName = $params['id'].'-'.$params['image']['name'];
                    $this->uploadimage($imageName, $params['image'], 'header');
                    
                    $this->db->setHeaderImageName($params['id'], $imageName);
                }
                
                $this->redirect ('cms'.DS.'header', 'success');
            }else{
                $this->redirect ('cms'.DS.'header', 'error');
            }
        }
        
        $this->set('header', $this->db->findHeader($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getHeaderImageName($params['id']);
        if($this->db->deleteHeader($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'header');
            }
            $this->redirect ('cms'.DS.'header', 'success');
        }else{
            $this->redirect ('cms'.DS.'header', 'error');
        }
    }
    
}
