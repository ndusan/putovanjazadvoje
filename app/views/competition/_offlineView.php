<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.offline.link']; ?>
            </div>
            <? if(!empty($offlineContestCollection)):?>
            <div class="wys">
                <!-- contest init image -->
                <img src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$offlineContestCollection['image_name']; ?>" />
                <!-- contest name -->
                <h1><?=$offlineContestCollection['name'];?></h1>
                <!-- contest init short content -->
                <?=$offlineContestCollection['content'];?>
                
                <!--prizes-->
                <? if(!empty($offlineContestPrizes)):?>
                <h2><?= $_t['contests.prizes']; ?></h2>
                <ul class="prizes">
                    <? $count=0;?>
                    <? foreach($offlineContestPrizes as $prize):?>
                    <li <? if($count++ >= 2): $count=0; echo 'class="last"'; endif;?>>
                        <h3><?=$prize['title'];?></h3>
                        <?=$prize['content'];?>
                        <? if(!empty($prize['image_name'])):?>
                        <img src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$prize['image_name']; ?>" />
                        <? endif; ?>
                    </li>
                    <? endforeach; ?>
                </ul>
                <? else: ?>
                    <?= $_t['contests.noprizes.label']; ?>
                <? endif;?>
            </div>
            <? else:?>
            <div class="noResults">
                <?= $_t['noresults.label']; ?>
            </div>
            <? endif;?>
        </div>
    </div>
</div>