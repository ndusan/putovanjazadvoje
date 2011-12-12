<?php

class PressController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {

        $subpageView = '_index';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'o-magazinu': $subpageView = '_aboutMagazine'; break;
                case 'download': $subpageView = '_download'; break;
                default: $subpageView = '_index';
            }
        }
        
        parent::set('subpage', $subpageView);
    }
}