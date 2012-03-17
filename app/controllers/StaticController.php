<?php

class StaticController extends Controller
{
    
    private $formValidation = array();
    
    private function init($params)
    {
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        $this->set('header', $this->db->getHeader());
    }
    
    /**
     * About Us
     * @param type $params 
     */
    public function aboutUsAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);

        $this->set('collection', $this->db->find($params, 'aboutus'));
        
        $this->init($params);
    }
    
    /**
     * Archive
     * @param type $params 
     */
    public function archiveAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $this->set('collection', $this->db->find($params, 'archive'));
        
        $this->set('magazineCollection', $this->db->getAllMagazine($params));
        
        $this->init($params);
    }
    
    /**
     * Give away
     * @param type $params 
     */
    public function giveAwayAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $array = array();
        
        $this->formValidation = array('name' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/');
        
        $this->sendFormIfSubmited($params, $array);
        
        $this->set('collection', $this->db->find($params, 'giveaway'));
        
        $this->set('magazineCollection', $this->db->getAllMagazine($params));
        
        $this->init($params);
    }
    
    /**
     * Order Previous
     * @param type $params 
     */
    public function orderPreviousAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $array = array();
        
        $this->formValidation = array('name' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/');
        
        $this->sendFormIfSubmited($params, $array);

        $this->set('collection', $this->db->find($params, 'orderprevious'));
        
        $this->set('magazineCollection', $this->db->getAllMagazine($params));
        
        $this->init($params);
    }
    
    
    /**
     * Sign up for magazine
     * @param type $params 
     */
    public function signUpForMagazineAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $array = array();
        
        $this->formValidation = array('name' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/');
        
        $this->sendFormIfSubmited($params, $array);
        
        $this->set('collection', $this->db->find($params, 'signupformagazine'));
        
        $this->set('magazineCollection', $this->db->getAllMagazine($params));
        
        $this->init($params);
    }
    
    
    public function searchAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $resultCollection = array();
        
        if(!empty($params['q'])){
            $resultCollection = $this->db->searchFor($params);
        }
        
        $this->set('resultCollection', $resultCollection);
        
        $this->init($params);
    }
    
    
    private function sendFormIfSubmited($params, array $array=array())
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        if(!isset($params['submit'])) return false;
        
        //Check if required fields are valid
        if(!$this->validate($this->formValidation, $params['collection'])) return false;
        
        $subject = '';
        
        if($this->sendEmail(MAIL_TO, $subject, $params['collection'], MAIL_FROM, $array)){
            
            $this->set('sent', true);
        }
    }
}