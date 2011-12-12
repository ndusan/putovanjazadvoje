<?php

class AdsController extends Controller
{
    
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {

        $subpageView = '_index';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'opsti-uslovi-i-informacije': $subpageView = '_termsAndConditions'; break;
                case 'cenovnik-i-formati': $subpageView = '_priceList'; break;
                default: $subpageView = '_index';
            }
        }
        
        parent::set('subpage', $subpageView);
    }
}