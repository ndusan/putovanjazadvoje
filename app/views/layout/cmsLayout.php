<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <link rel="shortcut icon" href="<?php echo IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all assets (js + css) -->
        <?= $html->assetsJs('jquery-1.6.4.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('app', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.dataTables.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery-ui-1.8.16.custom.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.thead-1.1.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('jquery.ui.tooltip', ASSETS_JS_PATH); ?>
        <?= $html->assetsCss('default', ASSETS_CSS_PATH); ?>
        <?= $html->assetsCss('demo_table', ASSETS_CSS_PATH); ?>
        <?//= $html->assetsCss('jquery-ui-1.8.16.custom', ASSETS_CSS_PATH); ?>


        <!-- Load all custom js -->
        <?= $html->js('app', JS_PATH); ?>
        <?= $html->js('tiny_mce', MCE_PATH); ?>
        <?= $html->allCustomJs(JS_PATH . 'cms' . DS); ?>

        <!-- Load all custom css -->
        <?= $html->css('cms', CSS_PATH); ?>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>">
        <div class="header">
            <ul class="headerNav">
                <li class="first">Hello, <?=$_SESSION['cms']['email'];?></li>
                <li <?= $this->_controller=='cmsUser'?'class="active"':''; ?>> <a  href="<?= DS . 'cms' . DS . 'users'; ?>">Users</a></li>
                <li <?= $this->_action=='settings'?'class="active"':''; ?>><a  href="<?= DS . 'cms'.DS.'settings'; ?>">Settings</a></li>
                <li><a href="<?= DS . 'logout'; ?>" class="jl">Logout</a></li>
            </ul>
            <h1><span>Admin panel</span>Putovanja za dvoje</h1>
        </div>
        <div class="wrapper">
            <div class="sidebar">
                <ul class="mainNav">
                    <li><a <?= $this->_controller=='cmsHome'?'class="active"':''; ?> href="<?= DS . 'cms'; ?>">Dashboard</a></li>
                    <li><a <?= $this->_controller=='cmsDictionary'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'dictionary'; ?>">Dictionary</a></li>
                    <li class="leaf">
                        <a <?= $this->_controller=='cmsStatic'?'class="active"':''; ?> href="#" name="leaf-link" child-class="leaf-child-static-content">Static content</a>
                        <ul class="leaf-child leaf-child-static-content" <?= $this->_controller=='cmsStatic'?'style="display:block;"':''; ?>>
                            <li><a <?= $this->_action=='aboutUs'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'static' .DS.'about-us'; ?>">About us</a></li>
                            <li><a <?= $this->_action=='giveAway'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'static' .DS.'give-away'; ?>">Give away</a></li>
                            <li><a <?= $this->_action=='orderPrevious'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'static' .DS.'order-previous'; ?>">Order Previous</a></li>
                            <li><a <?= $this->_action=='signUpForMagazine'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'static' .DS.'sign-up-for-magazine'; ?>">Sign Up For Magazine</a></li>
                            <li><a <?= $this->_action=='archive'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'static' .DS.'archive'; ?>">Archive</a></li>
                        </ul>
                    </li>
                    <li><a <?= $this->_controller=='cmsBackground'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'background'; ?>">Background</a></li>
                    <li><a <?= $this->_controller=='cmsMagazine'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'magazine'; ?>">Magazine</a></li>
                    <li><a <?= $this->_controller=='cmsCarousel'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'carousel'; ?>">Carousel</a></li>
                    <li><a <?= $this->_controller=='cmsNews'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'news'; ?>">News</a></li>
                    <li class="leaf">
                        <a <?= $this->_controller=='cmsPress'?'class="active"':''; ?> href="#" name="leaf-link" child-class="leaf-child-press">Press</a>
                        <ul class="leaf-child leaf-child-press" <?= $this->_controller=='cmsPress'?'style="display:block;"':''; ?>>
                            <li><a <?= $this->_action=='aboutMagazine'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'press' .DS.'about-magazine'; ?>">About magazine</a></li>
                        </ul>
                    </li>
                    <li class="leaf">
                        <a <?= $this->_controller=='cmsAds'?'class="active"':''; ?> href="#" name="leaf-link" child-class="leaf-child-ads">Ads</a>
                        <ul class="leaf-child leaf-child-ads" <?= $this->_controller=='cmsAds'?'style="display:block;"':''; ?>>
                            <li><a <?= $this->_action=='termsAndConditions'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'ads' .DS.'terms-and-conditions'; ?>">Terms and conditions</a></li>
                            <li><a <?= $this->_action=='priceList'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'ads' .DS.'price-list'; ?>">Price list</a></li>
                        </ul>
                    </li>
                    <li class="leaf">
                        <a <?= $this->_controller=='cmsDownload'?'class="active"':''; ?> href="#" name="leaf-link" child-class="leaf-child-download">Download</a>
                        <ul class="leaf-child leaf-child-download" <?= $this->_controller=='cmsDownload'?'style="display:block;"':''; ?>>
                            <li><a <?= $this->_action=='logo'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'download' .DS.'logo'; ?>">Logo</a></li>
                            <li><a <?= $this->_action=='wallpaper'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'download' .DS.'wallpaper'; ?>">Wallpaper</a></li>
                        </ul>
                    </li>
                    <li class="leaf">
                        <a <?= $this->_controller=='cmsContact'?'class="active"':''; ?> href="<?= DS . 'cms'.DS.'contact'; ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="content">
                <!-- This is a content that will be included on page inside of this layout -->
                <?php if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                    include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
            </div>
            <div class="footer">
                <img src="<?= IMAGE_PATH . 'Smartfish1.png'; ?>" />
            </div>


            <? if (isset($_GET['q'])): ?>
                <?
                switch ($_GET['q']) {
                    case 'error': $status = 'error';
                        $jmsg = 'There has been error in your request. Please, try again.';
                        break;
                    case 'success': $status = 'success';
                        $jmsg = 'Your request has been processed successfully.';
                        break;
                    case 'welcome': $status = 'success';
                        $jmsg = 'Welcome to admin CMS.';
                        break;
                    default: $status = '';
                        $jmsg = ''; //error
                }
                ?>
                <div id="j<?= $status; ?>" class="jnotif">
                    <?= $jmsg; ?>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('.jnotif').delay(3000).fadeOut(1000);
                });
                    
                var currentUrl = '<?=$_SERVER['REQUEST_URI'];?>';
            </script>
        <? endif; ?>
            <script type="text/javascript">
                var currentUrl = '<?=$_SERVER['REQUEST_URI'];?>';
            </script>
    </body>
</html>