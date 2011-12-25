<div class="mainContent">
    <div class="banner">
        <? if (!empty($carouselCollection)): ?>
            <div id="slides">
                <div class="slides_container">
                    <? foreach ($carouselCollection as $cc): ?>
                        <div class="slide">
                            <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                            <div class="desc">
                                <? if(!empty($cc['link'])):?>
                                <!-- Link -->
                                <a href="http://<?=rtrim($cc['link'], 'http://'); ?>" target="_blank">link</a>
                                <? endif;?>
                                <p><?= $cc['text']; ?></p>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
    </div>
    <div class="contentBox">
        <div class="context">
            <div class="bTitle blue">
                <?=$_t['home.editor.label'];?>
            </div>
            <div class="bTitle green">
               <?=$_t['home.editiontopic.label'];?>
            </div>
            <ul class="intro">
                <li>
                    <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    <div class="txt">
                        <p>
                            Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                        </p>
                    </div>
                </li>
                <li>
                    <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    <div class="txt">
                        <p>
                            Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                        </p>
                    </div>
                </li>
            </ul>
            <? if(!empty($topNewsCollection)):?>
            <ul class="news">
                <?foreach($topNewsCollection as $tNews):?>
                <li>
                    <div class="gTitle">
                        <?=$_t['home.new.label'];?>
                    </div>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' .DS.'thumb-'.$tNews['image_name']; ?>" />
                    <h2><?=$tNews['title'];?></h2>
                    <p>
                        <?=$tNews['heading'];?>
                    </p>
                </li>
                <? endforeach;?>
            </ul>
            <? endif;?>
            <? if(!empty($otherNewsCollection)):?>
            <ul class="actual">
                <? foreach($otherNewsCollection as $oNews):?>
                <li>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' .DS.'thumb-'.$oNews['image_name']; ?>" />
                    <div class="txt">
                        <h2><?=$oNews['title'];?></h2>
                        <p>
                            <?=$oNews['heading'];?>
                        </p>
                    </div>
                </li>
                <? endforeach; ?>
            </ul>
            <? endif;?>
        </div>
    </div>
</div>


