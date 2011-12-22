<?php

class CmsAdsController extends Controller
{
    
    public function termsAndConditionsAction($params)
    {
        
        if(!empty($params['submit'])){
            //Data submited
            if($this->db->submitTermsAndConditions($params['termsandconditions'], 'termsandconditions')){
                
                $this->redirect ('cms'.DS.'ads'.DS.'terms-and-conditions', 'success');
            }else{
                $this->redirect ('cms'.DS.'ads'.DS.'terms-and-conditions', 'error');
            }
        }
        
        $this->set('termsandconditions', $this->db->findTermsAndConditions());
    }
    
    public function priceListAction($params)
    {
        
        $this->set('priceListCollection', $this->db->findAllPriceLists());
    }
    
    public function addPriceListAction($params)
    {
    
        if(!empty($params['submit'])){
            //Add file in db
            if($id = $this->db->createPriceList($params['priceList'])){
                
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    
                    $this->db->setImageName($id, $newImageName);
                    $info = $this->uploadImage($newImageName, $params['image'], 'ads');
                    
                    $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'success');
                }else{
                    
                    $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'error');
                }
            }
        }
    }

    public function editPriceListAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updatePriceList($params['priceList'])){
                //If image uploaded add it
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['priceList']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['priceList']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['priceList']['id'], $newImageName);
                    
                    $info = $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'ads');
                }
                $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'success');
            }else{
                $this->redirect ('cms'.DS.'ads'.DS.'price-list'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        $this->set('priceList', $this->db->findPriceList($params['id']));
    }
    
    public function deletePriceListAction($params)
    {
        
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deletePriceList($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'ads');
                
            }
            $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'success');
        }else{
            $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'error');
        }
    }
    
}
