<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.winners.link']; ?>
            </div>
            <div class="wys">
                <h1><?= $_t['page.winners.title']; ?></h1>
            </div>

            <? if (!empty($winnersCollection)): ?>
                <ul class="winners">
                    <? foreach ($winnersCollection as $w): ?>
                        <li>
                            <!-- Contest name -->
                            <h2><?= $w['name']; ?></h2>
                            <!-- Contest description -->
                            <?= $w['content']; ?>
                            <!-- Winner image if set -->
                            <? if(!empty($w['winner_image_name'])):?>
                            <img src="<?= PUBLIC_UPLOAD_PATH .'contest'.DS.$w['winner_image_name']; ?>" />
                            <? endif;?>
                                    
                            <? if (!empty($w['winners'])): ?>
                                <? foreach ($w['winners'] as $winner): ?>
                                    <!-- Winner name -->
                                    <div class="wys">
                                    <h2><?=$winner['title'];?></h2>
                                    <?=$winner['content'];?>
                                    <h3><?=$winner['winner'];?></h3>
                                    </div>
                                    <? if(!empty($winner['image_name'])):?>
                                    <img src="<?= PUBLIC_UPLOAD_PATH .'contest'.DS.$winner['image_name']; ?>" />
                                    <? endif;?>
                                <? endforeach; ?>
                            <? endif; ?>
                        </li>
                    <? endforeach; ?>
                </ul>
            <? else: ?>
                <div class="noResults">
                    Sorry, no results here
                </div>
            <? endif; ?>
        </div>
    </div>
</div>