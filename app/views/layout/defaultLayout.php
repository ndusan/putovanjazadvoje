<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Putovanja za dvoje</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <link rel="author" href="<?= DS . 'public' . DS . 'humans.txt'; ?>" />
        <!-- Load all assets (js + css) -->
        <?= $html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('slides.min.jquery', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.lightbox-0.5.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('app', ASSETS_JS_PATH); ?>
        <?= $html->assetsCss('default', ASSETS_CSS_PATH); ?>
        <?= $html->assetsCss('jquery.lightbox-0.5', ASSETS_CSS_PATH); ?>

        <!-- Load all custom js -->
        <?= $html->js('app', JS_PATH); ?>
        <?= $html->allCustomJs(JS_PATH . 'default' . DS); ?>

        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
        <link href='http://fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>" style="<?= (!empty($bgd['background_color']) ? 'background:' . $bgd['background_color'] : ''); ?> <?= (!empty($bgd['image_name']) ? 'url(' . DS . 'public' . DS . 'uploads' . DS . 'background' . DS . $bgd['image_name'] . ')' : ''); ?> scroll no-repeat 50% 0;">
        <? if (!empty($bgd['link'])): ?>
            <a href="<?= $bgd['link']; ?>" target="_blank" class="bgL"></a>
            <a href="<?= $bgd['link']; ?>" target="_blank" class="bgR"></a>
        <? endif; ?>
        <div class="wrapper">
            <div class="header">
                <ul class="topNav">
                    <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pretplati-se-na-magazin';?>">Pretplati se</a></li>
                    <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'naruci-ranije-brojeve';?>">Naruci ranije brojeve</a></li>
                    <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pokloni-pretplatu';?>">Pokloni pretplatu</a></li>
                </ul>
                <a class="logo" href="/">
                    <img width=330" height="60" src="<?= IMAGE_PATH . 'logo.png'; ?>" />
                </a>
                <ul class="topInfo">
                    <li class="first">
                        <h1><?=$magazine['number'];?></h1>
                        <a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji'.DS.'sadrzaj';?>">broj u prodaji</a>
                    </li>
                    <? if(!empty($magazine['header_image_name'])):?>
                    <li><img src="<?= PUBLIC_UPLOAD_PATH.'magazine'.DS.$magazine['header_image_name']; ?>" /></li>
                    <? endif;?>
                </ul>
            </div>
            <div class="main">
                <? include_once VIEW_PATH . 'home' . DS . '_mainNavigation.php'; ?>
                <div class="content">
                    <div class="sideContent">
                        <div class="sideBox">
                            <div class="context">
                                <form id="search_form" name="search_form" action="<?= DS . $params['lang'] . DS . 'search'; ?>" method="get">
                                    <input id="search_field" type="text" name="q" value="<?= $_t['searchbar.search.label']; ?>" title="<?= $_t['searchbar.search.label']; ?>" />
                                    <input type="submit" value="find" />
                                </form>
                            </div>
                        </div>
                        
                        <? if (!empty($onlineCollection)): ?>
                        <!--ONLINE START -->
                        <div class="sideBox">
                            <div class="title">
                                <?= $_t['sidebar.onlinecontest.title']; ?>
                            </div>
                            <div class="context custom">
                                <a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'online';?>">
                                    <img src="<?= PUBLIC_UPLOAD_PATH .'contest'.DS. 'thumb-'.$onlineCollection['image_name']; ?>" alt="<?= $onlineCollection['name']; ?>" title="<?= $onlineCollection['name']; ?>"/>
                                </a>
                                <?= $onlineCollection['name']; ?>
                            </div>
                        </div>
                        <!-- ONLINE END-->
                        <? endif; ?>
                        
                        <? if (!empty($offlineCollection)): ?>
                        <!--OFFLINE START -->
                        <div class="sideBox">
                            <div class="title">
                                Offline nagradne igre
                            </div>
                            <? foreach ($offlineCollection as $offline): ?>
                            <div class="context custom">
                                <a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'offline?id='.$offline['id'];?>">
                                    <img src="<?= PUBLIC_UPLOAD_PATH .'contest'.DS. 'thumb-'.$offline['image_name']; ?>" alt="<?= $offline['name']; ?>" title="<?= $offline['name']; ?>"/>
                                </a>
                                <?= $offline['name']; ?>
                            </div>
                            <? endforeach; ?>
                        </div>
                        <!--OFFLINE END-->
                        <? endif; ?>
                        
                        <? if (!empty($bannerCollection)): ?>
                            <ul class="banners">
                                <? foreach ($bannerCollection as $banner): ?>
                                    <li><img src="<?= DS . 'public' . DS . 'uploads' . DS . 'banners' . DS . 'thumb-' . $banner['image_name']; ?>" /></li>
                                <? endforeach; ?>
                            </ul>
                        <? endif; ?>
                    </div>

                    <!-- This is a content that will be included on page inside of this layout -->
                    <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                        include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>


                </div>
            </div>
        </div>


        <div class="footerW">
            <div class="footer">
                <div class="copy">
                    Copyright © putovanjazadvoje.rs 2011.
                </div>
                <ul class="footerLinks">
                    <li class="first"><a href="#"><?= $_t['footer.home.link']; ?></a>
                        <ul>
                            <li><a href="#"><?= $_t['footer.magazine.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.actual.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.contests.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.press.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.adv.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.download.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.contact.link']; ?></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><?= $_t['footer.actual.link']; ?></a>
                        <ul>
                            <li><a href="#"><?= $_t['footer.magazine.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.actual.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.contests.link']; ?></a></li>
                            <li><a href="#"><?= $_t['footer.press.link']; ?></a></li>
                        </ul>
                    </li>
                    <li class="last"><a href="#"><?= $_t['footer.contact.link']; ?></a>
                        <ul>
                            <li>Email:</li>
                            <li>Tel:</li>
                            <li>Skype:</li>
                            <li>Facebook</li>
                            <li>Twitter</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>