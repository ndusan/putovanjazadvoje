<?php

class CmsUserController extends Controller
{
    
    public function indexAction($params)
    {
        $this->set('userCollection', $this->db->findAllUsers());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->createUser($params['user'])){
                $this->redirect ('cms'.DS.'users', 'success');
            }else{
                $this->redirect ('cms'.DS.'users'.DS.'add', 'error');
            }
        }
        
        $this->set('params', $params);
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->updateUser($params['user'])){
                $this->redirect ('cms'.DS.'users', 'success');
            }else{
                $this->redirect ('cms'.DS.'users'.DS.'edit'.$params['id'], 'error');
            }
        }
        
        $this->set('params', $params);
        $this->set('user', $this->db->findUser($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        if($this->db->deleteUser($params)){
            $this->redirect ('cms'.DS.'users', 'success');
        }else{
            $this->redirect ('cms'.DS.'users', 'error');
        }
    }
    
}
