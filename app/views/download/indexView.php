<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h2>Preuzmi Logo</h2>
                <!-- text about magazine -->
                <?=$dataCollection['text'];?>

                <? if(!empty($dataCollection['files'])):?>
                <ul class="downloads">
                    <? foreach($dataCollection['files'] as $file):?>
                    <li><a href="<?=PUBLIC_UPLOAD_PATH.'download'.DS.$file['file_name'];?>" target="_blank"><?=$file['file_name'];?> (Download <?=$file['type'];?>, <?=$file['size']/1024;?> kB)</a></li>
                    <? endforeach;?>
                </ul>
                <? endif;?>

                <h2>Preuzmi pozadine</h2>
                <ul class="magazines">
                    <li>
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>

                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>

                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>

                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>

                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>

                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                    <li>

                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                        <a href="">800 x 600</a>
                        <a href="">1024 x 768</a>
                        <a href="">1400 x 900</a>
                        <a href="">1600 x 1200</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>