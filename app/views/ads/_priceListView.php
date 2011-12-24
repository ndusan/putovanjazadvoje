<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.price.link'];?>
            </div>
            <div class="wys">
                <h2><?=$_t['page.price.title'];?></h2>
                <? if(!empty($dataCollection)):?>
                <ul class="downloads">
                    <? foreach($dataCollection as $data):?>
                    <li>
                        <a href="<?=PUBLIC_UPLOAD_PATH.'ads'.DS.$data['file_name'];?>" target="_blank">
                            <img src="<?=PUBLIC_UPLOAD_PATH.'ads'.DS.$data['file_name'];?>" />
                        </a>
                        <h4><?=$data['text'];?></h4>
                    </li>
                    <? endforeach; ?>
                </ul>
                <? endif;?>
            </div>
        </div>
    </div>
</div>