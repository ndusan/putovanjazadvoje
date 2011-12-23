<?php

class ContactController extends Controller
{
    
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {

        //Set left menu
        $this->setLeftMenu($params);

        $dataCollection = $this->db->getContact($params);
        $this->set('dataCollection', $dataCollection);
    }
}