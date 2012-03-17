<?php

class DownloadController extends Controller
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
        $dataCollection = $this->db->getLogo($params);
        
        $wDataCollection = $this->db->getWallpapers($params);
        
        $this->set('dataCollection', $dataCollection);
        $this->set('wDataCollection', $wDataCollection);
        
        $this->init($params);
    }
}