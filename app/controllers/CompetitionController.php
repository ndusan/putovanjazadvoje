<?php

class CompetitionController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $subpageView = '_winners';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'dobitnici-nagradnih-igara': $subpageView = '_winners'; break;
                case 'offline': $subpageView = '_offline'; break;
                case 'online': $subpageView = '_online'; break;
                default: $subpageView = '_winners';
            }
        }
        
        $this->set('subpage', $subpageView);
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        
        $this->set('winnersCollection', $this->db->getWinners($params));
    }
}