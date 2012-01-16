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
    private $tableBackground = 'background';
    private $tableMagazine = 'magazine';
    private $tableMagazineLanguage = 'magazine_language';

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


    public function getOnlineCompetitionCollection($params)
    {


    }


    public function getOfflineCompetitionCollection($params)
    {


    }

    public function getBackgroundOptions($params)
    {

        try{
            $query = sprintf("SELECT `link`, `image_name`, `background_color` FROM %s WHERE `active`=1", $this->tableBackground);
            $stmt = $this->dbh->prepare($query);

            $stmt->execute();

            return $stmt->fetch();
        }catch(Exception $e){

            return false;
        }
    }

    public function isActiveLang($isoCode)
    {

        try{
            $query = sprintf("SELECT `visible` FROM %s WHERE `iso_code`=:isoCode", $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);

            $stmt->bindParam(':isoCode', $isoCode, PDO::PARAM_INT);
            $stmt->execute();
            
            $response = $stmt->fetch();

            return $response['visible'] ? true : false;
        }catch(Exception $e){

            return false;
        }
    }
    
    
    public function getLatestMagazine($params)
    {
        try{
            $query = sprintf("SELECT `m`.`id`, `m`.`header_image_name`, `m`.`word_image_name`, `m`.`number`, `m`.`created`, 
                                     `ml`.`content`, `ml`.`impressum`, `ml`.`topic_title`, `ml`.`topic_content`, `ml`.`word` FROM %s AS `m` 
                                INNER JOIN %s AS `ml` ON `ml`.`magazine_id`=`m`.`id`
                                INNER JOIN %s AS `l` ON `l`.`id`=`ml`.`language_id`
                                WHERE `l`.`iso_code`=:isoCode 
                                ORDER BY `m`.`id` DESC LIMIT 0,1", 
                                $this->tableMagazine, 
                                $this->tableMagazineLanguage, 
                                $this->tableLanguage);
            $stmt = $this->dbh->prepare($query);
            
            $stmt->bindParam(':isoCode', $params['lang'], PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt->fetch();
        }catch(Exception $e){
            
            return false;
        }
    }
}