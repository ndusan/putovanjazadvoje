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
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/broj-u-pretplati\/?$/', 
            'controller' => 'magazine', 
            'action'     => 'index', 
            'layout'     => 'default'
    ),
    array(  'url'        => '/^(?P<lang>('.LANG.'))\/broj-u-pretplati\/(?P<page>(sadrzaj|impresum|tema-broja|rec-urednika))\/?$/', 
            'controller' => 'magazine', 
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
    array(  'url'        => '/^cms\/background\/?$/', 
            'controller' => 'cmsBackground', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    array(  'url'        => '/^cms\/magazine\/?$/', 
            'controller' => 'cmsMagazine', 
            'action'     => 'index', 
            'layout'     => 'cms'
    ),
    
    
);