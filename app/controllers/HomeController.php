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
        $this->set('topNewsCollection', $this->getLattestNews($params, $this->startOfNews, $this->numOfNews));
        
        $this->startOfNews = 3;
        $this->numOfNews = 2;
        $this->set('otherNewsCollection', $this->getLattestNews($params, $this->startOfNews, $this->numOfNews));
    }
    
    
    private function getCarouselCollection($params)
    {
        
        return $this->db->getCarouselCollection($params);
    }
    
    private function getLattestNews($params, $startOfNews, $numOfNews)
    {

        return $this->db->getLattestNews($params, $startOfNews, $numOfNews);
    }
    
}