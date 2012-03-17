<?php

class HomeController extends Controller
{
    private $startOfNews;
    private $numOfNews;
    
    private function init($params)
    {
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        $this->set('header', $this->db->getHeader());
    }
    
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
        
        $this->init($params);
    }
    
    public function addNewsletterAction($params)
    {
        if (true == $this->isAjax()) {
            //Ok to replay
            if ($this->db->addNewsletter($params['email'])) {
                echo json_encode('success');
            } else {
                echo json_encode('error');
            }
        } else {
            //Not ok
            $this->redirect('404', 'error');
        }
    }
    
    public function removeNewsletterAction($params)
    {
        //Check if it's email
        
        //Remove from db
        if($this->db->removeNewsletter($params['email'])) {
            $this->redirect('sr', 'success');
        } else {
            $this->redirect('sr', 'error');
        }
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