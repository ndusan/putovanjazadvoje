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
    
    
    
    public function downloadAction($params)
    {
        
        $this->set('downloadCollection', $this->db->findAllDownloads());
    }
    
    public function addDownloadAction($params)
    {
    
        if(!empty($params['submit'])){
            //Add file in db
            if($id = $this->db->createDownload($params['download'])){
                
                //If image uploaded add it
                if(0 == $params['image']['error'] && !empty($id)){
                    
                    $newImageName = $id.'-'.$params['image']['name'];
                    
                    $this->db->setImageName($id, $newImageName);
                    $info = $this->uploadImage($newImageName, $params['image'], 'press');
                    
                    $this->redirect ('cms'.DS.'press'.DS.'download', 'success');
                }else{
                    
                    $this->redirect ('cms'.DS.'press'.DS.'download', 'error');
                }
            }
        }
    }

    public function editDownloadAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited

            if($this->db->updateDownload($params['download'])){
                //If image uploaded add it
                if(0 == $params['image']['error']){
                    
                    $data = $this->db->getImageName($params['download']['id']);
                    $oldImageName = $data['image_name'];
                    
                    $newImageName = $params['download']['id'].'-'.$params['image']['name'];
                    $this->db->setImageName($params['download']['id'], $newImageName);
                    
                    $info = $this->reUploadImage($oldImageName, $newImageName, $params['image'], 'press');
                }
                $this->redirect ('cms'.DS.'press'.DS.'download', 'success');
            }else{
                $this->redirect ('cms'.DS.'press'.DS.'download'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        $this->set('download', $this->db->findDownload($params['id']));
    }
    
    public function deleteDownloadAction($params)
    {
        
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['id']);
        if($this->db->deleteDownload($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'press');
                
            }
            $this->redirect ('cms'.DS.'press'.DS.'download', 'success');
        }else{
            $this->redirect ('cms'.DS.'press'.DS.'download', 'error');
        }
    }
}

