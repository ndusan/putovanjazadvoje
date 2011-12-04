<?php

class StaticController extends Controller
{
    
    
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
        $this->sendFormIfSubmited($params, $array);
        
        parent::set('collection', $this->db->find($params, 'signupformagazine'));
    }
    
    
    private function sendFormIfSubmited($params, array $array=array())
    {
        
        if(!isset($params['submit'])) return false;
        
        $subject = '';
        if(parent::sendEmail(MAIL_TO, $subject, $params['collection'], MAIL_FROM, $array)){
            
            parent::set('sent', true);
        }
    }
}