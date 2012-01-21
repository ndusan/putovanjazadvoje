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
                            <h2><?= $w['name']; ?>:</h2>
                            <!-- Contest description -->
                            <p><?= $w['description']; ?></p>
                            <? if (!empty($w['winners'])): ?>
                                <? foreach ($w['winners'] as $winner): ?>
                                    <!-- Winner name -->
                                    <div class="wys">
                                    <h2>1. Nagrada bla bla bla</h2>
                                    <p>Knjiga Muškarci koje sam voljela, Adele Parks, PROFIL
                                        Petra Matjašec, Zagreb</p>
                                    <h3><?= $winner['winner']; ?></h3>
                                    </div>
                                    <img width="660" height="300" src="<?= IMAGE_PATH . 'dog.jpg'; ?>" />
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