<?php

class NewsController extends Controller
{
    
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $newsId = null;
        
        if(!empty($params['newsId']) && is_numeric($params['newsId'])){
            $newsId = $params['newsId'];
            
            $this->set('currentNews', $this->db->getSelectedNews($params));
        }
        
        $this->set('newsCollection', $this->db->getAllNews($params, $newsId));
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
    }
    
    
    
}