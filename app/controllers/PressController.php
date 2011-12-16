<?php

class PressController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {

        $subpageView = '_aboutMagazine';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'o-magazinu': $subpageView = '_aboutMagazine'; break;
                case 'download': $subpageView = '_download'; break;
                default: $subpageView = '_aboutMagazine';
            }
        }
        
        parent::set('subpage', $subpageView);
    }
}