<?php

class HomeController extends Controller
{
    private $startOfNews;
    private $numOfNews;
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $this->set('carouselCollection', $this->getCarouselCollection($params));
        
        $this->startOfNews = 0;
        $this->numOfNews = 3;
        $this->set('topNewsCollection', $this->getLatestNews($params, $this->startOfNews, $this->numOfNews));
        
        $this->startOfNews = 3;
        $this->numOfNews = 2;
        $this->set('otherNewsCollection', $this->getLatestNews($params, $this->startOfNews, $this->numOfNews));
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
    }
    
    
    private function getCarouselCollection($params)
    {
        
        return $this->db->getCarouselCollection($params);
    }
    
    private function getLatestNews($params, $startOfNews, $numOfNews)
    {

        return $this->db->getLatestNews($params, $startOfNews, $numOfNews);
    }
    
}