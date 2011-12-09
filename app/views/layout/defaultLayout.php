<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Putovanja za dvoje</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
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
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>" style="background:#333 url(<?= IMAGE_PATH . 'bg.jpg'; ?>) scroll no-repeat 50% 50%;">
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
                                    <input id="search_field" type="text" name="q" value="pretraga" title="pretraga" />
                                    <input type="submit" value="find" />
                                </form>
                            </div>
                        </div>
                        <div class="sideBox">
                            <div class="title">
                                ONLINE NAGRADNE IGRE
                            </div>
                            <div class="context custom">
                                asdasd
                            </div>
                        </div>
                        <div class="sideBox">
                            <div class="title">
                                NAGRADNE IGRE
                            </div>
                            <div class="context custom">
                                asdasd
                            </div>
                        </div>
                        <ul class="banners">
                            <li><img src="<?= IMAGE_PATH . 'banner.jpg'; ?>" /></li>
                            <li><img src="<?= IMAGE_PATH . 'banner.jpg'; ?>" /></li>
                            <li><img src="<?= IMAGE_PATH . 'banner.jpg'; ?>" /></li>
                        </ul>
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
                    <li class="first"><a href="#">POCETNA STRANA</a>
                        <ul>
                            <li><a href="#">Magazin</a></li>
                            <li><a href="#">Aktuelno</a></li>
                            <li><a href="#">Nagradne igre</a></li>
                            <li><a href="#">Press</a></li>
                            <li><a href="#">Oglasavanje</a></li>
                            <li><a href="#">Download</a></li>
                            <li><a href="#">Kontakt</a></li>
                        </ul>
                    </li>
                    <li><a href="#">NOVO IZDANJE</a>
                        <ul>
                            <li><a href="#">Magazin</a></li>
                            <li><a href="#">Aktuelno</a></li>
                            <li><a href="#">Nagradne igre</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </li>
                    <li class="last"><a href="#">KONTAKT</a>
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
        <script type="text/javascript">
            $(document).ready(function(){
               $('.wrapper').click(function(){
                  console.log('test'); 
               });
            });
        </script>
    </body>
</html>