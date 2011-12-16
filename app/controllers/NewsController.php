<?php

class NewsController extends Controller
{
    
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {
        $newsId = null;
        
        if(!empty($params['newsId']) && is_numeric($params['newsId'])){
            $newsId = $params['newsId'];
            
            parent::set('currentNews', $this->db->getSelectedNews($params));
        }

        parent::set('newsCollection', $this->db->getAllNews($params));
    }
    
    
    
}