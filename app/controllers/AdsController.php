<?php

class AdsController extends Controller
{
    
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $subpageView = '_termsAndConditions';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'opsti-uslovi-i-informacije': $subpageView = '_termsAndConditions'; break;
                case 'cenovnik-i-formati': $subpageView = '_priceList'; break;
                default: $subpageView = '_termsAndConditions';
            }
        }
        
        $this->set('subpage', $subpageView);
    }
}