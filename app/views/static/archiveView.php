<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.magazine.link'];?> / <?=$_t['breadcrumb.archive.link'];?>
            </div>
            <div class="wys">
                <h1><?=$_t['page.archive.title'];?></h1>
                <?= $collection['text']; ?>
                
                <? if(!empty($magazineCollection)):?>
                <ul class="magazines">
                    <?$countMagazine=0;?>
                    <? foreach($magazineCollection as $magazine):?>
                    <li <? if($countMagazine++ >= 6){ echo 'class="last"'; $countMagazine=0;} ?>>
                        <a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji'.DS.'sadrzaj?id='.$magazine['id'];?>">
                            <img src="<?= PUBLIC_UPLOAD_PATH .'magazine'.DS.'thumb-'.$magazine['image_name']; ?>" />
                        </a>
                        <h4><?=$magazine['number'];?></h4>
                    </li>
                    <? endforeach;?>
                </ul>
                <? endif;?>
            </div>
        </div>
    </div>
</div>