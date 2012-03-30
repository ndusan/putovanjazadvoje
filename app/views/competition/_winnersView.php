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
                            <div class="wys">                           
                                <?= $w['content']; ?>
                            </div>
                            <!-- Winner image if set -->
                            <? if (!empty($w['winner_image_name'])): ?>
                                <img src="<?= PUBLIC_UPLOAD_PATH . 'contest' . DS . $w['winner_image_name']; ?>" />
                            <? endif; ?>

                            <? if (!empty($w['winners'])): ?>
                                <? foreach ($w['winners'] as $winner): ?>
                                    <!-- Winner name -->
                                    <h2 class="prize"><?= $winner['title']; ?> : <?= $winner['winner']; ?></h2>
                                    <div class="wys">
                                        <h3><?= $_t['prize.label']; ?> :</h3>
                                        <?= $winner['content']; ?>
                                    </div>
                                    <? if (!empty($winner['image_name'])): ?>
                                        <img src="<?= PUBLIC_UPLOAD_PATH . 'contest' . DS . $winner['image_name']; ?>" />
                                    <? endif; ?>

                                <? endforeach; ?>
                            <? endif; ?>
                        </li>
                    <? endforeach; ?>
                </ul>
            <? else: ?>
                <div class="noResults">
                    <?= $_t['noresults.label']; ?>
                </div>
            <? endif; ?>
        </div>
    </div>
</div>