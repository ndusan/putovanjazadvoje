<?php

/**
 * HTML 
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class HTML {

    /**
     * Custom made css
     * @param array $array
     * @return string
     */
    function allCustomCss($path) {
        $string = '';
        foreach (glob($path . '*.css') as $fileName) {
            $string .= "<link href='" . DS . $fileName . "' rel='stylesheet' type='text/css' />\n";
        }

        return $string;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function allCustomJs($path) {
        $string = '';
        foreach (glob($path . '*.js') as $fileName) {
            $string .= "<script src='" . DS . $fileName . "' type='text/javascript'></script>\n";
        }

        return $string;
    }

    /**
     * Include CSS
     * @param $fileName
     * @return string
     */
    function css($fileName, $path) {
        $data = "<link href='" . DS . $path . $fileName . ".css' rel='stylesheet' type='text/css'/>\n";

        return $data;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function js($fileName, $path) {
        $data = "<script src='" . DS . $path . $fileName . ".js' type='text/javascript'></script>\n";

        return $data;
    }

    /**
     * Include JS
     * @param $fileName
     * @return string
     */
    function assetsJs($fileName, $path) {
        $data = "<script src='" . DS . $path . $fileName . ".js' type='text/javascript'></script>\n";

        return $data;
    }

    /**
     * Include CSS
     * @param $fileName
     * @return string
     */
    function assetsCss($fileName, $path) {
        $data = "<link href='" . DS . $path . $fileName . ".css' rel='stylesheet' type='text/css'/>\n";

        return $data;
    }

    /**
     * Display message
     * @param String $text
     * @return String
     */
    function msg($text) {

        if (!isset($text) || empty($text)) {

            return false;
        }

        $txt = "";
        switch ($text) {
            //Error
            case 'error':
                $txt = "<div class='error'>" . ERROR_MSG . "</div>";
                break;
            //Success
            case 'success':
                $txt = "<div class='success'>" . SUCCESS_MSG . "</div>";
                break;
            default:
                $txt = "<div class='error'>" . $text . "</div>";
                break;
        }

        return $txt;
    }

    function fb($link=null) {
        if (null == $link)
            return false;

        return '<div class="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) {return;}
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, "script", "facebook-jssdk"));</script>
                    <div class="fb-like" data-href="' . $link . '" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div>';
    }
    
    
    function twitter($array){
        
        if(empty($array)) return false;

        $twitterArray = array('url'=> $array['url'],
                              'text'=>$array['text'],
                              'counturl'=>$array['url']);
        
        return '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
               <a href="https://twitter.com/share?'.http_build_query($twitterArray).'" class="twitter-share-button" target="_blank">Tweet</a>';
    }

    function convertDate($date, $includeTime=false) {
        if (empty($date)) {

            return false;
        }

        //Remove time if exist
        if ($tmp = explode(' ', $date)) {

            $date = $tmp[0];
            $time = $tmp[1];
        }

        $oldDate = explode('-', $date);

        $result = $oldDate[2] . '-' . $oldDate[1] . '-' . $oldDate[0];

        if ($includeTime)
            $result.= ' ' . $tmp[1];

        return $result;
    }
    
    
    function snap($text, $length){
        
        $text = substr($text, 0, $length);
        $text = preg_replace("|<(\w+)([^>/]+)?|", "<$1", $text);

        return strip_tags($text);
    }

    
}
