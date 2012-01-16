<?php

class PressController extends Controller
{
    
    
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
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
    }
}