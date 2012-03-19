<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US" xml:lang="en-US" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Putovanja za dvoje</title>
        <link rel="shortcut icon" href="<?= IMAGE_PATH . 'favicon.ico'; ?>" type="image/x-icon" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Description" content="" />
        <meta name="Keywords" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=7" />
        <!-- Load all custom css -->
        <?= $html->css('default', CSS_PATH); ?>
        <link href='http://fonts.googleapis.com/css?family=Francois+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    </head>
    <body style="background:#369 url(<?= IMAGE_PATH . 'w404.jpg'; ?>) scroll no-repeat 50% 0;">
        <div class="wrapper">
            <div class="main" style="padding:100px 0">
                <div class="content">
                    <div class="fullBox">
                        <div class="context page404">
                            <div class="wys">
                                <h1>naslov ovde<?= $_t['404.title']; ?></h1>
                                <p>
                                    tekst ovde<?= $_t['404.text']; ?>
                                </p>
                                <p>
                                    neki tekst ovde<?= $_t['404.return.label']; ?> <a href="/">link ovde<?= $_t['404.homepage.link']; ?></a>
                                </p>
                                <!-- This is a content that will be included on page inside of this layout -->
                                <? if (file_exists(VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'))
                                    include (VIEW_PATH . $this->_controller . DS . $this->_action . 'View.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>