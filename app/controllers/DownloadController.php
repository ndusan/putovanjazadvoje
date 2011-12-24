<?php

class DownloadController extends Controller
{
    
    
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
    }
}