<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Putovanja za dvoje</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <link rel="author" href="<?=DS.'public'.DS.'humans.txt';?>" />
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
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>" style="<?=(!empty($bgd['background_color']) ? 'background:'.$bgd['background_color']:'');?> <?=(!empty($bgd['image_name']) ? 'url('.DS.'public'.DS.'uploads'.DS.'background'.DS.$bgd['image_name'].')' :''); ?> scroll no-repeat 50% 0;">
        <? if(!empty($bgd['link'])):?>
        <a href="<?=$bgd['link'];?>" target="_blank" class="bgL"></a>
        <a href="<?=$bgd['link'];?>" target="_blank" class="bgR"></a>
        <? endif; ?>
        <div class="wrapper">
            <div class="header">
                <h2>MAGAZIN</h2>
            </div>
            <div class="main">
                <? include_once VIEW_PATH . 'home' . DS . '_mainNavigation.php'; ?>
                <div class="content">
                    <div class="sideContent">
                        <div class="sideBox">
                            <div class="context">
                                <form id="search_form" name="search_form" action="<?=DS.$params['lang'].DS.'search';?>" method="get">
                                    <input id="search_field" type="text" name="q" value="<?=$_t['searchbar.search.label'];?>" title="<?=$_t['searchbar.search.label'];?>" />
                                    <input type="submit" value="find" />
                                </form>
                            </div>
                        </div>
                        <div class="sideBox">
                            <div class="title">
                                <?=$_t['sidebar.onlinecontest.title'];?>
                            </div>
                            <div class="context custom">
                                <img src="<?= IMAGE_PATH . 'baner1.jpg'; ?>" />
                                <? if(!empty($onlineCompetitionCollection)): ?>
                                <? foreach($onlineCompetitionCollection as $onlineCompetition):?>
                                <?=$onlineCompetition['text'];?>
                                <? endforeach;?>
                                <? endif;?>
                            </div>
                        </div>
                        <div class="sideBox">
                            <div class="title">
                                <?=$_t['sidebar.contest.title'];?>
                            </div>
                            <div class="context custom">
                                <img src="<?= IMAGE_PATH . 'baner1.jpg'; ?>" />
                                <? if(!empty($offlineCompetitionCollection)): ?>
                                <? foreach($offlineCompetitionCollection as $offlineCompetition):?>
                                <?=$offlineCompetition['text'];?>
                                <? endforeach;?>
                                <? endif;?>
                            </div>
                        </div>
                        <? if(!empty($bannerCollection)):?>
                        <ul class="banners">
                            <? foreach($bannerCollection as $banner):?>
                            <li><img src="<?= DS . 'public' . DS . 'uploads' . DS . 'banners' . DS . 'thumb-'.$currentNews['image_name']; ?>" /></li>
                            <? endforeach;?>
                        </ul>
                        <? endif;?>
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
                    <li class="first"><a href="#"><?=$_t['footer.home.link'];?></a>
                        <ul>
                            <li><a href="#"><?=$_t['footer.magazine.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.actual.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.contests.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.press.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.adv.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.download.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.contact.link'];?></a></li>
                        </ul>
                    </li>
                    <li><a href="#"><?=$_t['footer.actual.link'];?></a>
                        <ul>
                            <li><a href="#"><?=$_t['footer.magazine.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.actual.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.contests.link'];?></a></li>
                            <li><a href="#"><?=$_t['footer.press.link'];?></a></li>
                        </ul>
                    </li>
                    <li class="last"><a href="#"><?=$_t['footer.contact.link'];?></a>
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