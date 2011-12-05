<?php

class StaticController extends Controller
{
    
    private $formValidation = array();
    
    /**
     * About Us
     * @param type $params 
     */
    public function aboutUsAction($params)
    {

        parent::set('collection', $this->db->find($params, 'aboutus'));
    }
    
    /**
     * Archive
     * @param type $params 
     */
    public function archiveAction($params)
    {

        parent::set('collection', $this->db->find($params, 'archive'));
    }
    
    /**
     * Give away
     * @param type $params 
     */
    public function giveAwayAction($params)
    {
        $array = array();
        
        $this->formValidation = array('name' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/');
        
        $this->sendFormIfSubmited($params, $array);
        
        parent::set('collection', $this->db->find($params, 'giveaway'));
    }
    
    /**
     * Order Previous
     * @param type $params 
     */
    public function orderPreviousAction($params)
    {
        $array = array();
        
        $this->formValidation = array('name' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/');
        
        $this->sendFormIfSubmited($params, $array);

        parent::set('collection', $this->db->find($params, 'orderprevious'));
    }
    
    /**
     * Sign up for magazine
     * @param type $params 
     */
    public function signUpForMagazineAction($params)
    {
        $array = array();
        
        $this->formValidation = array('name' => '/^[[:alnum:][:punct:][:space:](š|đ|č|ć|ž|Š|Đ|Č|Ć|Ž)*]{1,50}$/');
        
        $this->sendFormIfSubmited($params, $array);
        
        parent::set('collection', $this->db->find($params, 'signupformagazine'));
    }
    
    
    private function sendFormIfSubmited($params, array $array=array())
    {
        
        if(!isset($params['submit'])) return false;
        
        //Check if required fields are valid
        if(!parent::validate($this->formValidation, $params['collection'])) return false;
        
        $subject = '';
        
        if(parent::sendEmail(MAIL_TO, $subject, $params['collection'], MAIL_FROM, $array)){
            
            parent::set('sent', true);
        }
    }
}