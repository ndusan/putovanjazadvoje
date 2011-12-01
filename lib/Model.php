<?php
/**
 * Model
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Model
{
        
        protected $dbh;
        
        /**
         * Contructor
         * @return boolean
         */
        function __construct()
        {
            try {
                $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=UTF-8", DB_USER, DB_PASS);
            }catch(PDOException $e){
               // echo $e->getMessage();
            }
        }
    
        /**
         * Password generator
         * @param int $len
         * @return string
         */
        function passwordGenerator($len = 6)
        {
                $r = '';
                for($i=0; $i<$len; $i++){
                    $r .= chr(rand(0, 25) + ord('a'));
                }
                
                return $r;
        }
        
        
        public function loadDictionary()
        {
            
            return array('kljuc2'=>'vredonst2');
        }
}