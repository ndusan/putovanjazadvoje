<?php

class CompetitionController extends Controller
{
    
    
    /**
     * HOME PAGE
     * @param type $params 
     */
    public function indexAction($params)
    {

        $subpageView = '_winners';
        
        if(!empty($params['page'])){
            switch($params['page']){
                case 'dobitnici-nagradnih-igara': $subpageView = '_winners'; break;
                case 'foto-naticanje': $subpageView = '_fotoCompetition'; break;
                case 'gde-smo': $subpageView = '_whereAreWe'; break;
                default: $subpageView = '_winners';
            }
        }
        
        parent::set('subpage', $subpageView);
    }
}