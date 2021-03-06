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

    }

    public function afterAction($params) {

        $this->set('params', $params);
    }

    public function uploadImage($imageName, $image, $folder) {

        if (move_uploaded_file($image['tmp_name'], UPLOAD_PATH . $folder . DS . $imageName)) {
            
            list($width, $height) = getimagesize(UPLOAD_PATH . $folder . DS . $imageName);
            $size = filesize(UPLOAD_PATH . $folder . DS . $imageName);
            
            return array('width'=>$width, 'height'=>$height, 'size'=>$size);
        } else {

            return false;
        }
    }

    public function reUploadImage($oldImage, $newImage, $image, $folder) {
        if (file_exists(UPLOAD_PATH . $folder . DS . $oldImage)) {

            $this->deleteImage($oldImage, $folder);
        }

        if (move_uploaded_file($image['tmp_name'], UPLOAD_PATH . $folder . DS . $newImage)) {
            list($width, $height) = getimagesize(UPLOAD_PATH . $folder . DS . $newImage);
            $size = filesize(UPLOAD_PATH . $folder . DS . $newImage);
            
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
    
    public function createThumbImage($imageName, $folder, $thumb_width, $thumb_height) {
        
        if (file_exists(UPLOAD_PATH . $folder . DS . $imageName)) {
            
            //Calculate heigth
            list($currWidth, $currHeight) = getimagesize(UPLOAD_PATH . $folder . DS . $imageName);
            
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
            
            $imagine = new \Imagine\Gd\Imagine();
            
            $image = $imagine->open(UPLOAD_PATH . $folder . DS . $imageName);
            $thumbnail = $image->thumbnail(new Imagine\Image\Box($new_width, $new_height));
            $thumbnail->save(UPLOAD_PATH . $folder . DS . 'thumb-'. $imageName);
            
            return true;
        } else {

            return false;
        }
        
        
    }

    public function sendEmail($to, $subject, $message, $from, $files=null) {
        
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
            $tArray = array('company'=>'Naziv firme', 
                            'occupation'=>'Delatnost', 
                            'contact'=>'Kontakt osoba', 
                            'email'=>'Email', 
                            'phone'=>'Telefon', 
                            'message'=>'Poruka',
                            'pages'=>'Želim da se reklamiram u',
                            'title'=>'Naslov poruke',
                            'name'=>'Ime i prezime');
            
            foreach ($message as $key => $val) {
                $messageHtml.= '<tr>';
                $messageHtml.= '<th>' . $tArray[$key] . '</th>';
                    if('pages' == $key){
                        $messageHtml.= '<td>';
                        foreach ($val as $p){
                            $messageHtml.= $p . '<br/>';
                        }
                        $messageHtml.= '</td>';
                    }else{
                        $messageHtml.= '<td>' . $val . '</td>';
                    }
                $messageHtml.= '</tr>';
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

}