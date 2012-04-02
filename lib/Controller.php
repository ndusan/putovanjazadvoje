<?php

/**
 * Default controller
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Controller {

    protected $_template;
    protected $db;
    public $renderHTML = 1;
    protected $imagine;

    /**
     * Constructor
     * @param String $controller
     * @param String $action
     * @param String $layout
     * @return void
     */
    public function __construct($controller, $action, $layout) {

        //Check if cms for session
        if ($layout == 'cms') {
            $this->userInfoAndSession();
        }

        //Model file
        $modelFile = ucfirst($controller) . "Model.php";
        $modelName = ucfirst($controller) . "Model";

        //Create model object
        if (file_exists('lib' . DS . 'model.class.php'))
            require_once 'lib' . DS . 'Model.php';

        if (file_exists(MODEL_PATH . $modelFile))
            require_once MODEL_PATH . $modelFile;
        $this->db = new $modelName;

        //Create template object
        if (file_exists('lib' . DS . 'template.class.php'))
            require_once 'lib' . DS . 'Template.php';
        $this->_template = new Template($controller, str_replace('Action', '', $action), $layout);
    }

    /**
     * Check session
     * @return void
     */
    public function userInfoAndSession() {
        if (!isset($_SESSION['cms'])) {
            $this->redirect('login', 'credits');
        }
    }

    public function getSession() {

        return $_SESSION['cms'];
    }

    /**
     * Set variables
     * @param String $name
     * @param Array $value
     * @return void
     */
    public function set($name, $value) {
        $this->_template->set($name, $value);
    }

    /**
     * Default array of css files
     * @param $array
     * @return void
     */
    public function defaultCss($array) {
        $this->_template->defaultCss($array);
    }

    /**
     * Default array of js files
     * @param $array
     * @return void
     */
    public function defaultJs($array) {
        $this->_template->defaultJs($array);
    }

    /**
     * Redirect
     * @param String $url
     * @return void
     */
    public function redirect($url, $msg, $fragment=null) {

        $url = "Location: " . BASE_PATH . (empty($url) ? '' : $url . DS) . (isset($msg) && !empty($msg) ? '?q=' . $msg : "") . (null != $fragment ? $fragment : '');
        header($url);
        exit;
    }

    /**
     * Desctructor
     * @return void
     */
    public function __destruct() {
        $this->_template->render($this->renderHTML);
    }

    /**
     * Set status
     * @param type $status 
     */
    public function setRenderHTML($status) {
        $this->renderHTML = $status;
    }

    /**
     * Is ajax
     * @return type 
     */
    protected function isAjax() {

        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ? true : false;
    }

    protected function setToken($length = "") {
        $code = md5(uniqid(rand(), true));
        if ($length != "") {

            return substr($code, 0, $length) . '-' . time();
        } else {

            return $code . '-' . time();
        }
    }

    protected function checkToken($session) {

        return isset($session['token']) && !empty($session['token']) ? true : false;
    }

    public function beforeAction($params) {

        $dic = array();
        
        //Load dictionary
        if(Cache::checkIfDictionaryExists()){
            
            $dic = Cache::loadFromDictionary();
        }else{
            
            $dic = $this->db->loadDictionary();
            Cache::importDictionary($dic);
        }
        
        if(isset($params['lang']) && !empty($dic)){
            $dic = $dic[$params['lang']];

            //Show keys if param set by GET
            if(isset($_GET['show_me']) && $_GET['show_me'] == 'keys'){
                //Overwrite values with keys
                foreach($dic as $k=>$v){
                    $dic[$k] = $k;
                }
            }
            
            $this->set('_t', $dic);
        }
    }

    public function afterAction($params) {

        $this->set('params', $params);
    }
    
    public function createFolder($folderName, $permission=0775, $recursive = true)
    {
        if(!is_dir($folderName)){
            if(!mkdir($folderName, $permission, $recursive))
                return false;
        }
        
        return true;
    }

    public function uploadImage($imageName, $image, $folder) {

        //Create structure if doesn't exist
        $this->createFolder(UPLOAD_PATH . $folder);
        
        if (move_uploaded_file($image['tmp_name'], UPLOAD_PATH . $folder . DS . $imageName)) {
            
            list($width, $height) = getimagesize(UPLOAD_PATH . $folder . DS . $imageName);
            $size = filesize(UPLOAD_PATH . $folder . DS . $imageName);
            chmod(UPLOAD_PATH . $folder . DS . $imageName, 0664);
            
            return array('width'=>$width, 'height'=>$height, 'size'=>$size);
        } else {
            
            return false;
        }
    }
    
    public function uploadFile($fileName, $file, $folder) {

        //Create structure if doesn't exist
        $this->createFolder(UPLOAD_PATH . $folder);
        
        if (move_uploaded_file($file['tmp_name'], UPLOAD_PATH . $folder . DS . $fileName)) {
            chmod(UPLOAD_PATH . $folder . DS . $fileName, 0644);
           
            return array('size'=>$file['size'], 'type'=>$file['type']);
        } else {
            
            return false;
        }
    }

    public function reUploadImage($oldImage, $newImage, $image, $folder) {
        if (file_exists(UPLOAD_PATH . $folder . DS . $oldImage)) {

            $this->deleteImage($oldImage, $folder);
        }

        //Create structure if doesn't exist
        $this->createFolder(UPLOAD_PATH . $folder);
        
        if (move_uploaded_file($image['tmp_name'], UPLOAD_PATH . $folder . DS . $newImage)) {
            list($width, $height) = getimagesize(UPLOAD_PATH . $folder . DS . $newImage);
            $size = filesize(UPLOAD_PATH . $folder . DS . $newImage);
            chmod(UPLOAD_PATH . $folder . DS . $newImage, 0664);
            
            return array('width'=>$width, 'height'=>$height, 'size'=>$size);
        } else {
            
            return false;
        }
    }

    public function deleteImage($imageName, $folder) {

        if (file_exists(UPLOAD_PATH . $folder . DS . $imageName)) {
            unlink(UPLOAD_PATH . $folder . DS . $imageName);

            return true;
        } else {

            return false;
        }
    }
    
    
    public function deleteFile($fileName, $folder) {
        
        if (file_exists(UPLOAD_PATH . $folder . DS . $fileName)) {
            unlink(UPLOAD_PATH . $folder . DS . $fileName);

            return true;
        } else {

            return false;
        }
    }
    
    public function createThumbImage($imageName, $folder, $thumb_width, $thumb_height) {
        
        //Create structure if doesn't exist
        $this->createFolder(UPLOAD_PATH . $folder);
        
        if (file_exists(UPLOAD_PATH . $folder . DS . $imageName)) {
            
            //Calculate heigth
            list($currWidth, $currHeight) = getimagesize(UPLOAD_PATH . $folder . DS . $imageName);
            
            if($currHeight<=0 || $thumb_height<=0) return false;
            
            $original_aspect = $currWidth / $currHeight;
            $thumb_aspect = $thumb_width / $thumb_height;

            if($original_aspect >= $thumb_aspect) {
               // If image is wider than thumbnail (in aspect ratio sense)
               $new_height = $thumb_height;
               $new_width = $currWidth / ($currHeight / $thumb_height);
            } else {
               // If the thumbnail is wider than the image
               $new_width = $thumb_width;
               $new_height = $currHeight / ($currWidth / $thumb_width);
            }
            
            $this->setImagine();
            $image = $this->imagine->open(UPLOAD_PATH . $folder . DS . $imageName);
            $thumbnail = $image->thumbnail(new Imagine\Image\Box($new_width, $new_height));
            $thumbnail->save(UPLOAD_PATH . $folder . DS . 'thumb-'. $imageName);
            
            return true;
        } else {

            return false;
        }
    }
    
    protected function createThumbImageAccordingToWidth($imageName, $folder, $thumb_width)
    {
        //Create structure if doesn't exist
        $this->createFolder(UPLOAD_PATH . $folder);
        
        if (file_exists(UPLOAD_PATH . $folder . DS . $imageName)) {
            //Calculate heigth
            list($cWidth, $cHeight) = getimagesize(UPLOAD_PATH . $folder . DS . $imageName);
            
            if (!isset($cWidth) || $cWidth <= 0) return false;
            
            $newHeight = $cHeight*($thumb_width/$cWidth);
            
            //Open original image
            $this->setImagine();
            $originalImage = $this->imagine->open(UPLOAD_PATH . $folder . DS . $imageName);

            //Resize only if required new width or height are smaller then required
            if ($cWidth>$thumb_width || $cHeight>$newHeight) {
                $originalImage->resize(new \Imagine\Image\Box($thumb_width, $newHeight))
                             ->save(UPLOAD_PATH . $folder . DS . 'thumb-'. $imageName);
            } else {
                $originalImage->save(UPLOAD_PATH . $folder . DS . 'thumb-'. $imageName);
            }

            return true;
        }
    }

    public function sendEmail($to, $subject, $message, $from, array $array=array(), array $files=array()) {
        
        //Header
        $headers = 'From:' . $from;

        //boundary 
        $semi_rand = md5(time());
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

        // headers for attachment 
        $headers .= "\nMIME-Version: 1.0\r\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

        //Build html for message
        $messageHtml = '';
        if (!empty($message)) {
            $messageHtml = '<html>
                                    <head>
                                      <title>' . $subject . '</title>
                                    </head>
                                    <body>
                                      <table>';
            
            if(!empty($array)){
                foreach ($message as $key => $val) {
                    $messageHtml.= '<tr>';
                    if (is_array($val)) {
                        $messageHtml.= '<th>Data list</th>'; 
                        $messageHtml.= '<td>' . print_r($val,true) . '</td>';
                    } elseif (!empty($key) && is_array($key)) {
                       $messageHtml.= '<th>' . $array[$key] . '</th>'; 
                       $messageHtml.= '<td>';
                        foreach ($val as $p){
                            $messageHtml.= $p . '<br/>';
                        }
                        $messageHtml.= '</td>';
                    } else {
                        $messageHtml.= '<th>' . $array[$key] . '</th>'; 
                        $messageHtml.= '<td>' . $val . '</td>';
                    }  
                    $messageHtml.= '</tr>';
                }
            }
            $messageHtml.= '</body>
                                    </html>';
        }
        
        // multipart boundary 
        $messageCollection = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=utf-8\r\n" .
                "Content-Transfer-Encoding: 7bit\n\n" . $messageHtml . "\n\n";
        
        // preparing attachments
        if (!empty($files)) {
            try {
                for ($i = 0; $i < count($files); $i++) {
                    if (is_file($files[$i])) {
                        $messageCollection .= "--{$mime_boundary}\n";
                        $fp = @fopen($files[$i], "rb");
                        $data = @fread($fp, filesize($files[$i]));
                        @fclose($fp);
                        $data = chunk_split(base64_encode($data));
                        $messageCollection .= "Content-Type: application/octet-stream; name=\"" . basename($files[$i]) . "\"\n" .
                                "Content-Description: " . basename($files[$i]) . "\n" .
                                "Content-Disposition: attachment;\n" . " filename=\"" . basename($files[$i]) . "\"; size=" . filesize($files[$i]) . ";\n" .
                                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                    }
                }
            } catch (Exception $e) {

                return false;
            }
        }
        
        $messageCollection .= "--{$mime_boundary}--";
        $returnpath = "-f" . $to;

        if (mail($to, $subject, $messageCollection, $headers, $returnpath)) {

            return true;
        } else {

            return false;
        }
    }
    
    
    /*
     * Check validation
     * @param array $validations
     * @param array $params
     * @return bool or array
     */
     public function validate($validations, $params) {
            $errors = array ('total_errors' => 0);
            
            foreach ($validations as $field => $validation){
                    if(!preg_match($validation, $params[$field])){
                            $errors['total_errors']++;
                            $errors[$field] = true;
                    }
            }

            if($errors['total_errors'] > 0){
                
                    return $errors;
            }else{
                
                    return false;
            }
    }
    
    public function setLeftMenu($params)
    {
        $onlineCollection = $this->db->getOnlineSponsorCollection($params);
        $offlineCollection = $this->db->getOfflineCollection($params);
        
        //Add background
        $backgroundOptions = $this->db->getBackgroundOptions($params);
        
        $this->set('onlineCollection', $onlineCollection);
        $this->set('offlineCollection', $offlineCollection);
        $this->set('bgd', $backgroundOptions);
        $this->set('bannerCollection', $this->db->getBannerCollection($params));
    }
    
    public function setImagine()
    {
        if ( IMAGINE == 'Imagick') {
            $this->imagine = new \Imagine\Imagick\Imagine();
        } else {
            $this->imagine = new \Imagine\Gd\Imagine();
        }
        
    }

}