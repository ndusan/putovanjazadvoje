<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.online.link']; ?>
            </div>
            <? if(!empty($onlineContestCollection)):?>
            <div class="wys">
                <h1><?= $_t['sidebar.onlinecontest.title']; ?></h1>
                <ul class="games">
                    <? foreach($onlineContestCollection as $online):?>
                    <li>
                        <img src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$online['image_name']; ?>" />
                        <a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'online'.DS.$online['id'].DS.'conditions';?>"><?= $_t['contest.play']; ?></a>
                        <h2><?=$online['name'];?></h2>
                        <div class="text">
                            <?=$online['content'];?>
                        </div>
                    </li>
                    <? endforeach; ?>
                </ul>
            </div>
            <? else:?>
            <div class="noResults">
                <?= $_t['noresults.label']; ?>
            </div>
            <? endif;?>
        </div>
    </div>
</div>


