<?php

class PressController extends Controller
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
        
        $subpageView = '_aboutMagazine';
        $dataCollection = $this->db->getAboutMagaine($params);

        $this->set('dataCollection', $dataCollection);
        $this->set('subpage', $subpageView);
        
        $this->init($params);
    }
}