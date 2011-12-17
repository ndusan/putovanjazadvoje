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
    }
}