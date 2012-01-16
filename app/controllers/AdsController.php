<?php

class AdsController extends Controller
{
    
    
    /**
     * @param type $params 
     */
    public function indexAction($params)
    {
        //Set left menu
        $this->setLeftMenu($params);
        
        $subpageView = '_termsAndConditions';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'opsti-uslovi-i-informacije': 
                    $subpageView = '_termsAndConditions'; 
                    $dataCollection = $this->db->getTermsAndConditions($params);
                    break;
                case 'cenovnik-i-formati': 
                    $subpageView = '_priceList'; 
                    $dataCollection = $this->db->getPriceList($params);
                    break;
                default: 
                    $subpageView = '_termsAndConditions';
                    $dataCollection = $this->db->getTermsAndConditions($params);
            }
        }
        
        $this->set('dataCollection', $dataCollection);
        $this->set('subpage', $subpageView);
        
        //Language
        $this->set('isActive', $this->db->isActiveLang('en'));
        $this->set('magazine', $this->db->getLatestMagazine($params));
    }
}