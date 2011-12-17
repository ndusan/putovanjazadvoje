<?php

class HomeController extends Controller
{
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $this->getCarouselCollection($params);
    }
    
    
    private function getCarouselCollection($params)
    {
        
        $this->set('carouselCollection', $this->db->getCarouselCollection($params));
    }
    
    
    
}