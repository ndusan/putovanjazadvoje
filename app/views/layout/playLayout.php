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
        <?= $html->assetsJs('jquery-ui-1.8.16.custom.min', ASSETS_JS_PATH); ?>
        <?= $html->assetsJs('app', ASSETS_JS_PATH); ?>
        <?= $html->assetsCss('default', ASSETS_CSS_PATH); ?>

        <!-- Load all custom js -->
        <?= $html->js('app', JS_PATH); ?>
        <?= $html->allCustomJs(JS_PATH . 'default' . DS); ?>

        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
        <link href='http://fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body data-controller="<?= $this->_controller; ?>" data-method="<?= $this->_action; ?>" style="<?= (!empty($bgd['background_color']) ? 'background:' . $bgd['background_color'] : ''); ?> <?= (!empty($bgd['image_name']) ? 'url(' . DS . 'public' . DS . 'uploads' . DS . 'background' . DS . $bgd['image_name'] . ')' : ''); ?> scroll no-repeat 50% 0;">
        <!-- This is a content that will be included on page inside of this layout -->
        <div class="wrapper">
            <div class="main">
                <div class="content">
                    <div class="fullBox">
                        <div class="context">
                            <h1>Play</h1>
                            <p>
                                asdasds
                            </p>
                            <!-- This is a content that will be included on page inside of this layout -->
                            <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                                include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</htm>