<?php

class CmsDictionaryController extends Controller
{
    
    public function indexAction($params)
    {
        parent::set('dictionaryCollection', $this->db->findAll());
    }
    
    public function addAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->create($params['dictionary'])){
                $this->deleteCacheDictionary();
                parent::redirect ('cms'.DS.'dictionary', 'success');
            }else{
                parent::redirect ('cms'.DS.'dictionary'.DS.'add', 'error');
            }
        }
    }
    
    public function editAction($params)
    {
       
        if(!empty($params['submit'])){
            //Data submited
            
            if($this->db->update($params['dictionary'])){
                parent::redirect ('cms'.DS.'dictionary', 'success');
            }else{
                parent::redirect ('cms'.DS.'dictionary'.DS.'edit'.$params['id'], 'error');
            }
        }
        
        parent::set('dictionary', $this->db->find($params['id']));
    }
    
    public function deleteAction($params)
    {
        parent::setRenderHTML(0);
        
        if($this->db->delete($params)){
            parent::redirect ('cms'.DS.'dictionary', 'success');
        }else{
            parent::redirect ('cms'.DS.'dictionary', 'error');
        }
    }
    
    
}
