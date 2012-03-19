<?php

class StaticController extends Controller
{
    
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
        
        $array = array('name'=>'Ime i prezime','company'=>'Firma','pin'=>'PIB','address'=>'Adresa','pak'=>'Postanski broj','city'=>'Grad','telephone'=>'Telefon','email'=>'Email',
                       'receiver_name'=>'Ime i prezime primaoca','receiver_company'=>'Firma primaoca','receiver_pin'=>'PIB primaoca','receiver_address'=>'Adresa primaoca','receiver_pak'=>'Postanski broj primaoca','receiver_city'=>'Grad primaoca','receiver_telephone'=>'Telefon primaoca','receiver_email'=>'Email primaoca');
        
        $this->sendFormIfSubmited($params, $array, 'Pokloni pretplatu forma');
        
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
        
        $array = array('name'=>'Ime i prezime','company'=>'Firma','pin'=>'PIB','address'=>'Adresa','pak'=>'Postanski broj','city'=>'Grad','telephone'=>'Telefon','email'=>'Email');
        
        $this->sendFormIfSubmited($params, $array,'Naruci ranije brojeve forma');

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
        
        $array = array('name'=>'Ime i prezime','company'=>'Firma','pin'=>'PIB','address'=>'Adresa','pak'=>'Postanski broj','city'=>'Grad','telephone'=>'Telefon','email'=>'Email');
        
        $this->sendFormIfSubmited($params, $array, 'Pretplati se na magazin forma');
        
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
    
    
    private function sendFormIfSubmited(array $params, array $array, $subject='Form')
    {

        if(!empty($params['submit']) && 
           !empty($_SESSION['anti-spam']) &&
           !empty($params['anti-spam']) &&
           $_SESSION['anti-spam'] == $params['anti-spam'])
        {
            
            $this->sendEmail(MAIL_TO, $subject, $params['collection'], MAIL_FROM, $array);
            
            unset($_SESSION['anti-spam']);
            $this->set('sent', true);
        }
    }
}