<?php

class MagazineController extends Controller
{
    
    private function init($params)
    {
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        $this->set('header', $this->db->getHeader());
    }
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);

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
        
        $this->set('subpage', $subpageView);
        
        $this->init($params);
        
        $magazineCollection = $this->db->getMagazine($params);
        $this->set('magazineCollection', $magazineCollection);
        
        $params['magazine_id'] = $magazineCollection['id'];
        $this->set('topicCollection', $this->db->getTopic($params));
    }
}