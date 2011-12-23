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
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'o-magazinu': 
                    $subpageView = '_aboutMagazine'; 
                    $dataCollection = $this->db->getAboutMagaine($params);
                    break;
                case 'download': 
                    $subpageView = '_download'; 
                    $dataCollection = $this->db->getDownload($params);
                    break;
                default: 
                    $subpageView = '_aboutMagazine';
                    $dataCollection = $this->db->getAboutMagaine($params);
            }
        }

        $this->set('dataCollection', $dataCollection);
        $this->set('subpage', $subpageView);
    }
}