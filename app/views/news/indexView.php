<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.actual.link'];?> 
            </div>
            <? if(!empty($currentNews)):?>
            <!--select news -->
            <div class="wys">
                <h1>
                    <?= $currentNews['title']; ?>
                </h1>
                <p>
                    <?= $currentNews['heading']; ?>
                </p>
                <? if (!empty($currentNews['image_name'])): ?>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . $currentNews['image_name']; ?>" />
                <? endif; ?>
                <?= $currentNews['text']; ?>
            </div>
            <h2><?=$_t['news.other-news.title'];?></h2>
            <? endif; ?>
            
            <? if(!empty($newsCollection)):?>
            
            <? if(empty($currentNews)):?>
            <div class="wys">
                <h1><?=$_t['news.actual.title'];?></h1>
            </div>
            <? endif;?>
            
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
                    <?=$_t['news.no-news.label'];?>.
                </div>
            <? endif; ?>
        </div>
    </div>
</div>