<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.download.link'];?>
            </div>
            <div class="wys">

                <h2><?=$_t['page.download-logo.title'];?></h2>
                <!-- text about magazine -->
                <?=$dataCollection['text'];?>

                <? if(!empty($dataCollection['files'])):?>

                <ul class="downloads">
                    <? foreach($dataCollection['files'] as $file):?>
                    <li><a href="<?=PUBLIC_UPLOAD_PATH.'download'.DS.$file['file_name'];?>" target="_blank"><?=$file['file_name'];?> (Download <?=$file['type'];?>, <?=$file['size']/1024;?> kB)</a></li>
                    <? endforeach;?>
                </ul>
                <? endif;?>

                <? if(!empty($wDataCollection['images'])):?>
                <h2><?=$_t['page.download-wallpapers.title'];?></h2>
                <ul class="magazines">
                    <li>
                        <img src="<?= PUBLIC_UPLOAD_PATH .'download'.DS. $wDataCollection['image_name']; ?>" />
                        <? foreach($wDataCollection['images'] as $wd):?>
                        <a href="<?= PUBLIC_UPLOAD_PATH .'download'.DS. $wd['image_name']; ?>" target="_blank"><?=$wd['group'];?></a>
                        <? endforeach; ?>
                    </li>
                </ul>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>