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
                    <? if(!empty($magazine['image_name'])):?>
                    <img src="<?= PUBLIC_UPLOAD_PATH.'magazine'.DS.$magazine['word_image_name']; ?>" />
                    <? endif;?>
                    <div class="txt">
                        <?=$html->snap($magazine['word_heading'], 200).'...';?>
                    </div>
                </li>
                <li>
                    <? if(!empty($magazine['word_image_name'])):?>
                    <img src="<?= PUBLIC_UPLOAD_PATH.'magazine'.DS.$magazine['image_name']; ?>" />
                    <? endif;?>
                    <div class="txt">
                        <p>
                            <?=$html->snap($magazine['topic_content_heading'], 200).'...';?>
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
                    <? if(!empty($tNews['image_name'])):?>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' .DS.'thumb-'.$tNews['image_name']; ?>" />
                    <? endif; ?>
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
                    <? if(!empty($oNews['image_name'])):?>
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'news' .DS.'thumb-'.$oNews['image_name']; ?>" />
                    <? endif;?>
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


