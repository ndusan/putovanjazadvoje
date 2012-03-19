<?php

class ContactController extends Controller
{
    
    private function init($params)
    {
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
        $this->set('header', $this->db->getHeader());
    }
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {

        //Set left menu
        $this->setLeftMenu($params);

        if(!empty($params['submit']) && 
           !empty($_SESSION['anti-spam']) && 
           !empty($params['anti-spam']) &&
           $_SESSION['anti-spam'] == $params['anti-spam'])
        {
            $map = array('name'=>'Ime i prezime','company'=>'Kompanija','city'=>'Grad','country'=>'Drzava','email'=>'Email','message'=>'Poruka');
            $this->sendEmail(MAIL_TO, 'Kontakt forma', $params['collection'], MAIL_FROM, $map);
            
            unset($_SESSION['anti-spam']);
            $this->set('sent', true);
        }
        
        $dataCollection = $this->db->getContact($params);
        $this->set('dataCollection', $dataCollection);
        
        $this->init($params);
    }
}