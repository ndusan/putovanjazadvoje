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
        
        if(!empty($params['submit'])){
            
            //Data submited
            if($this->db->submitPriceList($params['pricelist'], 'pricelist')){
                //Data submited
                
                if(!empty($params['file'])){
                    foreach($params['file']['error'] as $k=>$v){
                        //Skip if not ok
                        if(0 != $v) continue;
                        
                        $newFileName = time().'-'.$params['file']['name'][$k];
                        $this->db->addFiles($newFileName, 'pricelist');
                        
                        $file = array('name'=>$params['file']['name'][$k],
                                       'type'=>$params['file']['type'][$k],
                                       'tmp_name'=>$params['file']['tmp_name'][$k],
                                       'error'=>$params['file']['error'][$k],
                                       'size'=>$params['file']['size'][$k],
                                       );
                        
                        $info = $this->uploadFile($newFileName, $file, 'ads');
                        $info['alias'] = $params['alias'][$k];
                        $this->db->updateFileInfo($newFileName, $info);
                    }
                }
                
                $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'success');
            }else{
                $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'error');
            }
        }
        
        $this->set('fileCollection', $this->db->findFiles('pricelist'));
        $this->set('pricelist', $this->db->findPriceList());
    }
    
    
    public function deleteFileAction($params)
    {
        if(empty($params['id'])) $this->redirect ('cms'.DS.'ads'.DS.'price-list', 'error');
        
        //FileName 
        $fileName = $this->db->getFileName($params['id'], 'pricelist');
        
        if($this->db->removeFile($params['id'], 'pricelist')){
            //Delete file
            $this->deleteFile($fileName['file_name'], 'ads');
            
            echo json_encode(array('response'=>true));
        }else{
            
            echo json_encode(array('response'=>false));
        }
        
    }
    
    
}
