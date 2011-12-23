<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h1>Aktuelno</h1>
            </div>
            <? if(!empty($currentNews)):?>
            <!--select news -->
            <ul class="actual">
                <li>
                    <? if(!empty($currentNews['image_name'])):?>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS .$currentNews['image_name']; ?>" />
                    <? endif;?>
                    <div class="txt">
                        <h2>
                        <?=$currentNews['title'];?>
                        </h2>
                        <p>
                            <?=$currentNews['text'];?>
                        </p>
                    </div>
                </li>
            </ul>
            <? endif; ?>
            
            <? if(!empty($newsCollection)):?>
            <!-- all news -->
            <ul class="actual">
                <? foreach($newsCollection as $news):?>
                <li>
                    <? if(!empty($news['image_name'])):?>
                    <a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$news['id'];?>">
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . 'thumb-'.$news['image_name']; ?>" />
                    </a>
                    <? endif;?>
                    <div class="txt">
                        <h2>
                        <a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$news['id'];?>">
                        <?=$news['title'];?>
                        </a>
                        </h2>
                        <p>
                            <?=$news['heading'];?>
                        </p>
                    </div>
                </li>
                <? endforeach;?>
            </ul>
            <? else: ?>
            <div class="noContent">
                No actual news.
            </div>
            <? endif; ?>
        </div>
    </div>
</div>