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
    
    
    public function newsletterAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $this->set('carouselCollection', $this->getCarouselCollection($params));
        
        
        if (!empty($params['submit']) && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $params['email'])) {
            //Ok to replay
            
            if ($this->db->addNewsletter($params['email'])) {
                $this->set('sent', true);
            }
        }
        
        $this->init($params);
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
    
    
    /**
     * Anti-spam
     */
    public function antiSpamAction()
    {
        $lenght=6;
        $number = ""; 
        for ($i = 1; $i <= $lenght; $i++) 
        { 
             $number .= rand(0,9).""; 
        } 
        $width = 11*$lenght; 
        $height = 30; 

        $img = ImageCreate($width, $height); 
        $background = imagecolorallocate($img,255,255,255); 
        $color_black = imagecolorallocate($img,0,0,0); 
        $color_grey = imagecolorallocate($img,169,169,169); 
        imagerectangle($img,0, 0,$width-1,$height-1,$color_grey); 
        imagestring($img, 5, $lenght, 7, $number, $color_black); 
        $_SESSION['anti-spam'] = $number;
        //////// VERY IMPORTANT 
        header('Content-Type: image/png'); 
        //////// VERY IMPORTANT 
        imagepng($img); 
        imagedestroy($img);
    }
    
}