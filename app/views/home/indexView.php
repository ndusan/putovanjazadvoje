<div class="mainContent">
    <div class="banner">
        <? if (!empty($carouselCollection)): ?>
            <div id="slides">
                <div class="slides_container">
                    <? foreach ($carouselCollection as $cc): ?>
                        <div class="slide">
                            <!-- Link on image -->
                            <? if (!empty($cc['link'])): ?>
                                <a href="http://<?= rtrim($cc['link'], 'http://'); ?>" target="_blank">
                            <? endif; ?>
                                    <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                                    <span class="desc">
                                        <h2><?= $cc['text']; ?></h2>
                                    </span>
                            <? if (!empty($cc['link'])): ?>
                                </a>
                            <? endif; ?>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
    </div>
    <div class="contentBox">
        <div class="context">
            <div class="bTitle blue">
                <?= $_t['home.editor.label']; ?>
            </div>
            <div class="bTitle green">
                <?= $_t['home.editiontopic.label']; ?>
            </div>
            <ul class="intro">
                <li>
                    <? if (!empty($magazine['word_image_name'])): ?>
                    <a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji'.DS.'rec-urednika';?>">
                        <img src="<?= PUBLIC_UPLOAD_PATH . 'magazine' . DS . 'thumb-' . $magazine['word_image_name']; ?>" />
                    </a>
                    <? endif; ?>
                    <div class="txt">
                        <?= $html->snap($magazine['word_heading'], 200) . '...'; ?>
                    </div>
                </li>
                <li>
                    <? if (!empty($magazine['image_name'])): ?>
                        <a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji'.DS.'tema-broja';?>">
                        <img src="<?= PUBLIC_UPLOAD_PATH . 'magazine' . DS . 'thumb-' . $magazine['image_name']; ?>" />
                        </a>
                    <? endif; ?>
                    <div class="txt">
                        <p>
                            <?= $html->snap($magazine['topic_content_heading'], 200) . '...'; ?>
                        </p>
                    </div>
                </li>
            </ul>
            <? if (!empty($topNewsCollection)): ?>
                <ul class="news">
                    <? $countNews = 0; ?>
                    <? foreach ($topNewsCollection as $tNews): ?>
                        <li <?= $countNews++ >= count($otherNewsCollection) ? 'class="last"' : ''; ?>>
                            <div class="gTitle">
                                <?= $_t['home.new.label']; ?>
                            </div>
                            <? if (!empty($tNews['image_name'])): ?>
                                <a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$tNews['id'];?>">
                                <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . 'thumb-' . $tNews['image_name']; ?>" />
                                </a>
                            <? endif; ?>
                            <h2>
                                <a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$tNews['id'];?>">
                                <?= $tNews['title']; ?>
                                </a>
                            </h2>
                            <p>
                                <?= $tNews['heading']; ?>
                            </p>
                        </li>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>
            <? if (!empty($otherNewsCollection)): ?>
                <ul class="actual">
                    <? foreach ($otherNewsCollection as $oNews): ?>
                        <li >
                            <? if (!empty($oNews['image_name'])): ?>
                                <a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$oNews['id'];?>">
                                <img src="<?= PUBLIC_UPLOAD_PATH . 'news' . DS . 'thumb-' . $oNews['image_name']; ?>" />
                                </a>
                            <? endif; ?>
                            <div class="txt">
                                <h2>
                                    <a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$oNews['id'];?>">
                                    <?= $oNews['title']; ?>
                                    </a>
                                </h2>
                                <p>
                                    <?= $oNews['heading']; ?>
                                </p>
                            </div>
                        </li>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>
        </div>
    </div>
</div>


