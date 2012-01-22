<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.winners.link']; ?>
            </div>
            <? if(!empty($offlineContestCollection)):?>
            <div class="wys">
                <!-- contest init image -->
                <img width="660" height="100" src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$offlineContestCollection['image_name']; ?>" />
                <!-- contest name -->
                <h1><?=$offlineContestCollection['name'];?></h1>
                <!-- contest init short content -->
                <?=$offlineContestCollection['content'];?>
                
                <!--prizes-->
                <? if(!empty($offlineContestPrizes)):?>
                <h2>Nagrade</h2>
                <ul class="prizes">
                    <? $count=0;?>
                    <? foreach($offlineContestPrizes as $prize):?>
                    <li <? if($count++ >= 2): $count=0; echo 'class="last"'; endif;?>>
                        <h3><?=$prize['title'];?></h3>
                        <?=$prize['content'];?>
                        <? if(!empty($prize['image_name'])):?>
                        <img width="210" height="100" src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$prize['image_name']; ?>" />
                        <? endif; ?>
                    </li>
                    <? endforeach; ?>
                </ul>
                <? else: ?>
                    Sorry, no prizes set!
                <? endif;?>
            </div>
            <? else:?>
            <div class="noResults">
                Sorry, no results here
            </div>
            <? endif;?>
        </div>
    </div>
</div>