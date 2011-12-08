<?php

class MagazineController extends Controller
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
                case 'sadrzaj': $subpageView = '_content'; break;
                case 'impresum': $subpageView = '_impressum'; break;
                case 'tema-broja': $subpageView = '_topicNumber'; break;
                case 'rec-urednika': $subpageView = '_editorsWord'; break;
                default: $subpageView = '_index';
            }
        }
        
        parent::set('subpage', $subpageView);
    }
    
    
    
}