<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?= DS . $params['lang']; ?>">Pocetna</a> / Magazin / O nama
            </div>
            <? if(!empty($onlineContestCollection)):?>
            <div class="wys">
                <h1>Online nagradne igre</h1>
                <ul class="games">
                    <? foreach($onlineContestCollection as $online):?>
                    <li>
                        <img width="660" height="100" src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$online['image_name']; ?>" />
                        <a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'online'.DS.$online['id'].DS.'conditions';?>">IGRAJ</a>
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
                Sorry, no results here
            </div>
            <? endif;?>
        </div>
    </div>
</div>


