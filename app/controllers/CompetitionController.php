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
                case 'dobitnici-nagradnih-igara': 
                    $this->set('winnersCollection', $this->db->getWinners($params));
                    $subpageView = '_winners'; 
                    break;
                case 'offline': 
                    $this->set('offlineContestCollection', $this->db->getOfflineContest($params));
                    $this->set('offlineContestPrizes', $this->db->getAllOfflinePrizes($params));
                    $subpageView = '_offline'; 
                    break;
                case 'online': 
                    $onlineContestCollection = $this->db->getAllOnlineContests($params);
                    $this->set('onlineContestCollection', $onlineContestCollection);
                    $subpageView = '_online'; 
                    break;
                default: 
                    $this->set('winnersCollection', $this->db->getWinners($params));
                    $subpageView = '_winners';
            }
        }
        
        $this->set('subpage', $subpageView);
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
    }
    
    public function conditionsAction($params)
    {
        
        if(empty($params['contest_id']) || !is_numeric($params['contest_id'])){
            //Go to onilne games home page
            $this->redirect($params['lang'].'nagradne-igre'.DS.'online', 'error');
        }
        
        //Set left menu
        $this->setLeftMenu($params);
        
        if(!empty($params['submit']) && !empty($params['accept'])){
            
            $tocken = sha1(time());
            //Store info about player
            if($this->db->setPlayerInfo($tocken, $params)){
                //Redirect to game
                $this->redirect($params['lang'].DS.'nagradne-igre'.DS.'online'.DS.$params['contest_id'].DS.'play', 'start&tocken='.$tocken);
            }
            
        }
        //Conditions 
        $this->set('conditionCollection', $this->db->getConditions($params));
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        
    }
    
    public function playAction($params)
    {
        if(empty($params['contest_id']) || !is_numeric($params['contest_id']) || empty($params['tocken'])){
            //Go to onilne games home page
            $this->redirect($params['lang'].'nagradne-igre'.DS.'online', 'error');
        }
        //Set left menu
        $this->setLeftMenu($params);
        
        
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
    }
}