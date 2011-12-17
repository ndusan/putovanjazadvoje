<?php

class CmsDictionaryController extends Controller
{
    
    public function indexAction($params)
    {
        $this->set('dictionaryCollection', $this->db->findAll());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->create($params['dictionary'])){
                $this->redirect ('cms'.DS.'dictionary', 'success');
            }else{
                $this->redirect ('cms'.DS.'dictionary'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->update($params['dictionary'])){
                $this->redirect ('cms'.DS.'dictionary', 'success');
            }else{
                $this->redirect ('cms'.DS.'dictionary'.DS.'edit'.$params['id'], 'error');
            }
        }
        
        $this->set('dictionary', $this->db->find($params['id']));
    }
    
    public function deleteAction($params)
    {
        $this->setRenderHTML(0);
        
        if($this->db->delete($params)){
            $this->redirect ('cms'.DS.'dictionary', 'success');
        }else{
            $this->redirect ('cms'.DS.'dictionary', 'error');
        }
    }
    
    
}
