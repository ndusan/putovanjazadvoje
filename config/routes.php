<?php
$routes = array(
    //Home page
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/?$/', 
            'controller' => 'home', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //404
    array(  'url'        => '/^404\/?$/', 
            'controller' => 'home', 
            'action'     => 'noPageFound', 
            'layout'     => '404'
    ),
    //Static content
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/o-nama\/?$/', 
            'controller' => 'static', 
            'action'     => 'aboutUs', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/pretplati-se-na-magazin\/?$/', 
            'controller' => 'static', 
            'action'     => 'signUpForMagazine', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/naruci-ranije-brojeve\/?$/', 
            'controller' => 'static', 
            'action'     => 'orderPrevious', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/pokloni-pretplatu\/?$/', 
            'controller' => 'static', 
            'action'     => 'giveAway', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/arhiva-izdanja\/?$/', 
            'controller' => 'static', 
            'action'     => 'archive', 
            'layout'     => 'default'
    ),
    //SEARCH
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/search\/?$/', 
            'controller' => 'static', 
            'action'     => 'search', 
            'layout'     => 'default'
    ),
    //Magazine
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/broj-u-prodaji\/?$/', 
            'controller' => 'magazine', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/broj-u-prodaji\/(?P<page>(sadrzaj|impresum|tema-broja|rec-urednika))\/?$/', 
            'controller' => 'magazine', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //News 
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/aktuelno\/?$/', 
            'controller' => 'news', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //Competition
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/nagradne-igre\/(?P<page>(dobitnici-nagradnih-igara|foto-naticanje|gde-smo))\/?$/', 
            'controller' => 'competition', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    
    //Press
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/press\/(?P<page>(o-magazinu|download))\/?$/', 
            'controller' => 'press', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    
    //Ads
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/oglasavanje\/(?P<page>(opsti-uslovi-i-informacije|cenovnik-i-formati))\/?$/', 
            'controller' => 'ads', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //Download
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/download\/?$/', 
            'controller' => 'download', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    //Contact
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/kontakt\/?$/', 
            'controller' => 'contact', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
        
    //Login page
    array(  'url'        => '/^login\/?$/', 
            'controller' => 'login', 
            'action'     => 'index', 
            'layout'     => 'login'
    ),
    //Logout page
    array(  'url'        => '/^logout\/?$/', 
            'controller' => 'login', 
            'action'     => 'logout', 
            'layout'     => 'empty'
    ),
    
    //CMS page
    array(  'url'        => '/^cms\/?$/', 
            'controller' => 'cmsHome', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/settings\/?$/', 
            'controller' => 'cmsHome', 
            'action'     => 'settings', 
            'layout'     => 'cms'
    ),
    
    //CMS dictionary page
    array(  'url'        => '/^cms\/dictionary\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/dictionary\/add\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/dictionary\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/dictionary\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsDictionary', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS user page
    array(  'url'        => '/^cms\/users\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/add\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/user\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsUser', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    //CMS static content
    array(  'url'        => '/^cms\/static\/about-us\/?$/', 
            'controller' => 'cmsStatic', 
            'action'     => 'aboutUs', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/static\/sign-up-for-magazine\/?$/', 
            'controller' => 'cmsStatic', 
            'action'     => 'signUpForMagazine', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/static\/order-previous\/?$/', 
            'controller' => 'cmsStatic', 
            'action'     => 'orderPrevious', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/static\/give-away\/?$/', 
            'controller' => 'cmsStatic', 
            'action'     => 'giveAway', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/static\/archive\/?$/', 
            'controller' => 'cmsStatic', 
            'action'     => 'archive', 
            'layout'     => 'cms'
    ),
    
    //CMS background page
    array(  'url'        => '/^cms\/background\/?$/', 
            'controller' => 'cmsBackground', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/background\/add\/?$/', 
            'controller' => 'cmsBackground', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/background\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsBackground', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/background\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsBackground', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS magazine page
    array(  'url'        => '/^cms\/magazine\/?$/', 
            'controller' => 'cmsMagazine', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/magazine\/wizard(\/(?P<id>\d*))*\/?$/', 
            'controller' => 'cmsMagazine', 
            'action'     => 'wizard', 
            'layout'     => 'cms'
    ), 
    
    //CMS carousel page
    array(  'url'        => '/^cms\/carousel\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/carousel\/add\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/carousel\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/carousel\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsCarousel', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    
    //CMS news page
    array(  'url'        => '/^cms\/news\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/add\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'add', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/edit\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'edit', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/news\/delete\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'delete', 
            'layout'     => 'empty'
    ),
    array(  'url'        => '/^cms\/news\/delete\/image\/(?P<id>\d*)\/?$/', 
            'controller' => 'cmsNews', 
            'action'     => 'deleteImage', 
            'layout'     => 'empty'
    ),
    
);