<?php

class CmsDownloadController extends Controller
{
    
    public function logoAction($params)
    {
        
        if(!empty($params['submit'])){
            
            //Data submited
            if($this->db->submitLogo($params['logo'], 'logo')){
                //Data submited
                
                if(!empty($params['file'])){
                    foreach($params['file']['error'] as $k=>$v){
                        //Skip if not ok
                        if(0 != $v) continue;
                        
                        $newFileName = time().'-'.$params['file']['name'][$k];
                        $this->db->addFiles($newFileName, 'logo');
                        
                        $file = array('name'=>$params['file']['name'][$k],
                                       'type'=>$params['file']['type'][$k],
                                       'tmp_name'=>$params['file']['tmp_name'][$k],
                                       'error'=>$params['file']['error'][$k],
                                       'size'=>$params['file']['size'][$k],
                                       );
                        
                        $info = $this->uploadFile($newFileName, $file, 'download');
                        $this->db->updateFileInfo($newFileName, $info);
                    }
                }
                
                $this->redirect ('cms'.DS.'download'.DS.'logo', 'success');
            }else{
                $this->redirect ('cms'.DS.'download'.DS.'logo', 'error');
            }
        }
        
        $this->set('fileCollection', $this->db->findFiles('logo'));
        $this->set('logo', $this->db->findLogo());
    }
    
    
    public function deleteFileAction($params)
    {
        if(empty($params['id'])) $this->redirect ('cms'.DS.'download'.DS.'logo', 'error');
        
        //FileName 
        $fileName = $this->db->getFileName($params['id'], 'logo');
        
        if($this->db->removeFile($params['id'], 'logo')){
            //Delete file
            $this->deleteFile($fileName['file_name'], 'download');
            
            echo json_encode(array('response'=>true));
        }else{
            
            echo json_encode(array('response'=>false));
        }
        
    }
    
    
    public function wallpaperAction($params)
    {
        
        $this->set('wallpaperCollection', $this->db->findAllWallpapers());
    }
    
    public function addWallpaperAction($params)
    {
        if(!empty($params['submit'])){
            
            $imageGroups = array('800x600', '1024x768', '1400x1900', '1600x1200');
            //Check if at least one has been uploaded
            $uploaded = false;
            foreach($imageGroups as $g){
                if($params['image']['error'][$g] == 0) $uploaded = true;
            }
            
            if(!$uploaded) $this->redirect ('cms'.DS.'download'.DS.'add', 'error');
            
            
            //Data submited
            if($id = $this->db->createWallpaper($params['wallpaper'])){
                //If image uploaded add it
                $i = 0;
                foreach($imageGroups as $g){
                    if(0 == $params['image']['error'][$g] && !empty($id)){

                        $newImageName = (time()+$i++).'-'.$params['image']['name'][$g];

                        $this->db->setImageName($id, $newImageName, $g);
                        
                        $image = array('name'=>$params['image']['name'][$g],
                                       'type'=>$params['image']['type'][$g],
                                       'tmp_name'=>$params['image']['tmp_name'][$g],
                                       'error'=>$params['image']['error'][$g],
                                       'size'=>$params['image']['size'][$g]);
                        
                        $info = $this->uploadImage($newImageName, $image, 'download');

                    }
                }
                $this->redirect ('cms'.DS.'download'.DS.'wallpaper', 'success');
            }else{
                $this->redirect ('cms'.DS.'download'.DS.'wallpaper'.DS.'add', 'error');
            }
        }
    }
    
    public function editWallpaperAction($params)
    {
        if(!empty($params['submit'])){
            //Data submited

            $imageGroups = array('800x600', '1024x768', '1400x1900', '1600x1200');
            
            if($this->db->updateWallpaper($params['wallpaper'])){
                $i=0;
                foreach($imageGroups as $g){
                    if(isset($params['image']['error'][$g]) && 0 == $params['image']['error'][$g] && !empty($params['wallpaper']['id'])){
                        
                        $newImageName = (time()+$i++).'-'.$params['image']['name'][$g];
                        $this->db->setImageName($params['wallpaper']['id'], $newImageName, $g);

                        $image = array('name'=>$params['image']['name'][$g],
                                       'type'=>$params['image']['type'][$g],
                                       'tmp_name'=>$params['image']['tmp_name'][$g],
                                       'error'=>$params['image']['error'][$g],
                                       'size'=>$params['image']['size'][$g]);
                        
                        $info = $this->uploadImage($newImageName, $image, 'download');
                    }
                }
                
                $this->redirect ('cms'.DS.'download'.DS.'wallpaper', 'success');
            }else{
                $this->redirect ('cms'.DS.'download'.DS.'wallpaper'.DS.'edit'.DS.$params['id'], 'error');
            }
        }
        
        $this->set('wallpaper', $this->db->findWallpaper($params['id']));
    }
    
    public function deleteWallpaperAction($params)
    {
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageNames($params['id']);
        if($this->db->deleteWallpaper($params)){
            
            //If exist delete
            if(!empty($data)){
                foreach($data as $d){
                    $oldImageName = $d['image_name'];
                    $this->deleteImage($oldImageName, 'download');
                }
            }
            $this->redirect ('cms'.DS.'download'.DS.'wallpaper', 'success');
        }else{
            $this->redirect ('cms'.DS.'download'.DS.'wallpaper', 'error');
        }
    }
    
    
    public function deleteWallpaperImageAction($params)
    {
        
        $this->setRenderHTML(0);
        
        $data = $this->db->getImageName($params['image_id'], $params['group']);
        
        if($this->db->deleteWallpaperImage($params)){
            
            //If exist delete
            if(!empty($data)){
                $oldImageName = $data['image_name'];
                $this->deleteImage($oldImageName, 'download');
            }
            
            if(!$this->db->checkIfLastImage($params)){
                $this->deleteWallpaperAction($params);
            }
            
            $this->redirect ('cms'.DS.'download'.DS.'wallpaper'.DS.'edit'.DS.$params['id'], 'success');
        }else{
            $this->redirect ('cms'.DS.'download'.DS.'wallpaper'.DS.'edit'.DS.$params['id'], 'error');
        }
    }
    
}
