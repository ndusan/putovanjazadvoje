<?php

class CmsPressController extends Controller
{
    
    
    public function aboutMagazineAction($params)
    {
        
        if(!empty($params['submit'])){
            
            //Data submited
            if($this->db->submitMagazine($params['aboutmagazine'], 'aboutmagazine')){
                //Data submited
                
                if(!empty($params['file'])){
                    foreach($params['file']['error'] as $k=>$v){
                        //Skip if not ok
                        if(0 != $v) continue;
                        
                        $newFileName = time().'-'.$params['file']['name'][$k];
                        $this->db->addFiles($newFileName, 'aboutmagazine');
                        
                        $file = array('name'=>$params['file']['name'][$k],
                                       'type'=>$params['file']['type'][$k],
                                       'tmp_name'=>$params['file']['tmp_name'][$k],
                                       'error'=>$params['file']['error'][$k],
                                       'size'=>$params['file']['size'][$k],
                                       );
                        
                        $info = $this->uploadFile($newFileName, $file, 'press');
                        $info['alias'] = $params['alias'][$k];
                        $this->db->updateFileInfo($newFileName, $info);
                    }
                }
                
                $this->redirect ('cms'.DS.'press'.DS.'about-magazine', 'success');
            }else{
                $this->redirect ('cms'.DS.'press'.DS.'about-magazine', 'error');
            }
        }
        
        $this->set('fileCollection', $this->db->findFiles('aboutmagazine'));
        $this->set('aboutmagazine', $this->db->findMagazine());
    }
    
    
    public function deleteFileAction($params)
    {
        if(empty($params['id'])) $this->redirect ('cms'.DS.'press'.DS.'about-magazine', 'error');
        
        //FileName 
        $fileName = $this->db->getFileName($params['id'], 'aboutmagazine');
        
        if($this->db->removeFile($params['id'], 'aboutmagazine')){
            //Delete file
            $this->deleteFile($fileName['file_name'], 'press');
            
            echo json_encode(array('response'=>true));
        }else{
            
            echo json_encode(array('response'=>false));
        }
        
    }
    
    
    
}

