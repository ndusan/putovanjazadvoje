<?php
/**
 * Model
 * @author Dusan Novakovic (ndusan@gmail.com)
 *
 */
class Model
{
        
        protected $dbh;
        
        private $tableTranslation = 'translation';
        private $tableLanguage = 'language';
        private $tableLanguageTranslation = 'language_translation';
        
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
            $output = array();
            
            try{
                
                $query = sprintf("SELECT * FROM %s", $this->tableLanguage);
                $stmt = $this->dbh->prepare($query);
                
                $stmt->execute();
                $response = $stmt->fetchAll();
                
                if(empty($response)) throw new \Exception('No language specified in DB');
                
                foreach($response as $r){
                    
                    $query = sprintf("SELECT `t`.`name`, `lt`.`text` FROM %s AS `t`
                                        INNER JOIN %s AS `lt` ON `lt`.`translation_id`=`t`.`id`
                                        WHERE `lt`.`language_id`=:languageId", 
                                        $this->tableTranslation, $this->tableLanguageTranslation);
                    $stmt = $this->dbh->prepare($query);
                    
                    $stmt->bindParam(':languageId', $r['id'], PDO::PARAM_INT);
                    $stmt->execute();

                     $tmp = $stmt->fetchAll();
                     
                     foreach($tmp as $t){
                        $output[$r['iso_code']][$t['name']] = $t['text'];
                     }
                }
                
                return $output;
            }catch(Exception $e){

                return false;
            }
        }
}