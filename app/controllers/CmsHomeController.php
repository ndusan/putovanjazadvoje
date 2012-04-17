<?php

class CmsHomeController extends Controller
{
    
    public function indexAction($params)
    {
        
        
        // enter your login, password and id into the variables below to try it out

        $login = GAQ_USERNAME;
        $password = GAQ_PASSWORD;

        // NOTE: the id is in the form ga:12345 and not just 12345
        // if you do e.g. 12345 then no data will be returned
        // read http://www.electrictoolbox.com/get-id-for-google-analytics-api/ for info about how to get this id from the GA web interface
        // or load the accounts (see below) and get it from there
        // if you don't specify an id here, then you'll get the "Badly formatted request to the Google Analytics API..." error message
        $id = GAQ_PROFILE_ID;
        
        $set = array('visitors'=>false, 'visitorsToday'=>false);
        
        $data['visitors'] = Cache::get(array('key'=>'visitors'));
        if (false != $data['visitors']) {
            $set['visitors'] = true;
        }
        
        $data['visitorsToday'] = Cache::get(array('key'=>'visitorsToday'));
        if (false != $data['visitorsToday']) {
            $set['visitorsToday'] = true;
        }
        
        if (false == $set['visitors'] || false == $set['visitorsToday']) {
            $api = new analytics_api();
            if($api->login($login, $password)) {
                $data = array('visitors' => $api->data($id, '', 'ga:bounces,ga:newVisits,ga:visits,ga:pageviews,ga:uniquePageviews'),
                              'visitorsToday' => $api->get_summary($id, 'yesterday'));
        
                Cache::set(array('key'=>'visitors', 'data'=>$data['visitors']));
                Cache::set(array('key'=>'visitorsToday', 'data'=>$data['visitorsToday']));
            }
        }
        
        $this->set('visitors', $data['visitors']);
        $this->set('visitorsToday', $data['visitorsToday']);
    }
    
    public function settingsAction($params)
    {

        if(!empty($params['cache']) && $params['cache'] == 'clean'){
            //Clean cache
            Cache::deleteDictionary();
        }elseif(!empty($params['submit'])){
            //Data submited
            
            if($this->db->setLanguage('en', $params['settings']['lang'])){
                //If image uploaded add it
                parent::redirect ('cms'.DS.'settings', 'success', '#fragment-2');
            }else{
                parent::redirect ('cms'.DS.'settings', 'error', '#fragment-2');
            }
        }
        
        $this->set('en', $this->db->isActive('en'));
        
    }
    
}