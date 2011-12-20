<?php

class CmsAdsController extends Controller
{
    
    public function termsAndConditionsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submitTermsAndConditions($params['termsandconditions'], 'termsandconditions')){
                
                $this->redirect ('cms'.DS.'ads'.DS.'terms-and-conditions', 'success');
            }else{
                $this->redirect ('cms'.DS.'ads'.DS.'terms-and-conditions', 'error');
            }
        }
        
        $this->set('termsandconditions', $this->db->findTermsAndConditions());
    }
    
}
