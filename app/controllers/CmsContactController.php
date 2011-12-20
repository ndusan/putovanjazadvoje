<?php

class CmsContactController extends Controller
{
    
    public function indexAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submitContact($params['contact'], 'contact')){
                
                $this->redirect ('cms'.DS.'contact', 'success');
            }else{
                $this->redirect ('cms'.DS.'contact', 'error');
            }
        }
        
        $this->set('contact', $this->db->findContact());
    }
    
}
