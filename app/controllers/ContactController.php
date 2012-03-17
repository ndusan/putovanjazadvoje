<?php

class ContactController extends Controller
{
    
    private function init($params)
    {
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        $this->set('header', $this->db->getHeader());
    }
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {

        //Set left menu
        $this->setLeftMenu($params);

        $dataCollection = $this->db->getContact($params);
        $this->set('dataCollection', $dataCollection);
        
        $this->init($params);
    }
}