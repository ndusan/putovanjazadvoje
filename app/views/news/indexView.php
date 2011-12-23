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
            <div class="wys">
                <h1>
                    <?= $currentNews['title']; ?>
                </h1>
                <p>
                    <?= $news['heading']; ?>
                </p>
                <? if (!empty($currentNews['image_name'])): ?>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . 'thumb-' . $currentNews['image_name']; ?>" />
                <? endif; ?>
                <p>
                    <?= $currentNews['text']; ?>
                </p>
            </div>
            <h2>Ostale novosti</h2>
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