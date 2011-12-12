<?php

class HomeController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {

        $this->getCarouselCollection($params);
    }
    
    
    private function getCarouselCollection($params)
    {
        
        parent::set('carouselCollection', $this->db->getCarouselCollection($params));
    }
    
    
    
}