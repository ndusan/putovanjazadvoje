<?php

class CmsPressController extends Controller
{
    
    
    public function aboutMagazineAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submitMagazine($params['aboutmagazine'], 'aboutmagazine')){
                
                $this->redirect ('cms'.DS.'press'.DS.'about-magazine', 'success');
            }else{
                $this->redirect ('cms'.DS.'press'.DS.'about-magazine', 'error');
            }
        }
        
        $this->set('aboutmagazine', $this->db->findMagazine());
    }
}
