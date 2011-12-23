<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h1>Download</h1>
                <p>asdasd</p>
                <? if(!empty($dataCollection)):?>
                <ul class="magazines">
                    <? foreach($dataCollection as $data):?>
                    <li>
                        <a href="<?=PUBLIC_UPLOAD_PATH.'press'.DS.$data['image_name'];?>" target="_blank">
                            <img src="<?=PUBLIC_UPLOAD_PATH.'press'.DS.$data['image_name'];?>" />
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