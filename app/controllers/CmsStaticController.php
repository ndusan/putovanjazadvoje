<?php

class CmsStaticController extends Controller
{
    
    public function indexAction($params){}
    
    public function aboutUsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['aboutus'], 'aboutus')){
                
                parent::redirect ('cms'.DS.'static'.DS.'about-us', 'success');
            }else{
                parent::redirect ('cms'.DS.'static'.DS.'about-us', 'error');
            }
        }
        
        parent::set('aboutus', $this->db->find('aboutus'));
    }
    
    
    public function giveAwayAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['giveaway'], 'giveaway')){
                
                parent::redirect ('cms'.DS.'static'.DS.'give-away', 'success');
            }else{
                parent::redirect ('cms'.DS.'static'.DS.'give-away', 'error');
            }
        }
        
        parent::set('giveaway', $this->db->find('giveaway'));
    }
    
    
    public function orderPreviousAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['orderprevious'], 'orderprevious')){
                
                parent::redirect ('cms'.DS.'static'.DS.'order-previous', 'success');
            }else{
                parent::redirect ('cms'.DS.'static'.DS.'order-previous', 'error');
            }
        }
        
        parent::set('orderprevious', $this->db->find('orderprevious'));
    }
    
    
    public function signUpForMagazineAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['signupformagazine'], 'signupformagazine')){
                
                parent::redirect ('cms'.DS.'static'.DS.'sign-up-for-magazine', 'success');
            }else{
                parent::redirect ('cms'.DS.'static'.DS.'sign-up-for-magazine', 'error');
            }
        }
        
        parent::set('signupformagazine', $this->db->find('signupformagazine'));
    }
    
    public function archiveAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submit($params['archive'], 'archive')){
                
                parent::redirect ('cms'.DS.'static'.DS.'archive', 'success');
            }else{
                parent::redirect ('cms'.DS.'static'.DS.'archive', 'error');
            }
        }
        
        parent::set('archive', $this->db->find('archive'));
    }
    
    
}