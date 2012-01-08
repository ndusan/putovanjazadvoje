<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>BG Info Box</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>" style="<?= (!empty($bgd['background_color']) ? 'background:' . $bgd['background_color'] : ''); ?> <?= (!empty($bgd['image_name']) ? 'url(' . DS . 'public' . DS . 'uploads' . DS . 'background' . DS . $bgd['image_name'] . ')' : ''); ?> scroll no-repeat 50% 0;">
        <? if (!empty($bgd['link'])): ?>
            <a href="<?= $bgd['link']; ?>" target="_blank" class="bgL"></a>
            <a href="<?= $bgd['link']; ?>" target="_blank" class="bgR"></a>
        <? endif; ?>
        <div class="wrapper">
            <div class="header">
                <ul class="topNav">
                    <li><a href="#">Pretplati se</a></li>
                    <li><a href="#">Naruci ranije brojeve</a></li>
                    <li><a href="#">Pokloni pretplatu</a></li>
                </ul>
                <a class="logo" href="/">
                    <img width=330" height="60" src="<?= IMAGE_PATH . 'logo.png'; ?>" />
                </a>
                <ul class="topInfo">
                    <li class="first">
                        <h1>BROJ 18</h1>
                        <a href="#">broj u prodaji</a>
                    </li>
                    <li><img src="<?= IMAGE_PATH . 'topImg.png'; ?>" /></li>
                </ul>
            </div>
            <div class="main">
                <? include_once VIEW_PATH . 'home' . DS . '_mainNavigation.php'; ?>
                <div class="content">
                    <div class="fullBox">
                        <div class="context">
                            <h1>404 : Page Not Found</h1>
                            <p>
                                Sorry, but the page you are trying to find is not here.
                            </p>
                            <!-- This is a content that will be included on page inside of this layout -->
                            <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                                include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
                        </div>
                    </div>
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