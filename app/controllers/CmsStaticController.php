<?php

class CmsStaticController extends Controller
{
    
    public function indexAction($params){}
    
    public function aboutUsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['aboutus'], 'aboutus')){
                
                $this->redirect ('cms'.DS.'static'.DS.'about-us', 'success');
            }else{
                $this->redirect ('cms'.DS.'static'.DS.'about-us', 'error');
            }
        }
        
        $this->set('aboutus', $this->db->find('aboutus'));
    }
    
    
    public function giveAwayAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['giveaway'], 'giveaway')){
                
                $this->redirect ('cms'.DS.'static'.DS.'give-away', 'success');
            }else{
                $this->redirect ('cms'.DS.'static'.DS.'give-away', 'error');
            }
        }
        
        $this->set('giveaway', $this->db->find('giveaway'));
    }
    
    
    public function orderPreviousAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['orderprevious'], 'orderprevious')){
                
                $this->redirect ('cms'.DS.'static'.DS.'order-previous', 'success');
            }else{
                $this->redirect ('cms'.DS.'static'.DS.'order-previous', 'error');
            }
        }
        
        $this->set('orderprevious', $this->db->find('orderprevious'));
    }
    
    
    public function signUpForMagazineAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['signupformagazine'], 'signupformagazine')){
                
                $this->redirect ('cms'.DS.'static'.DS.'sign-up-for-magazine', 'success');
            }else{
                $this->redirect ('cms'.DS.'static'.DS.'sign-up-for-magazine', 'error');
            }
        }
        
        $this->set('signupformagazine', $this->db->find('signupformagazine'));
    }
    
    public function archiveAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['archive'], 'archive')){
                
                $this->redirect ('cms'.DS.'static'.DS.'archive', 'success');
            }else{
                $this->redirect ('cms'.DS.'static'.DS.'archive', 'error');
            }
        }
        
        $this->set('archive', $this->db->find('archive'));
    }
    
    
}