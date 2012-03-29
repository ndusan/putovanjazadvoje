<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.download.link']; ?>
            </div>
            <div class="wys">

                <h2><?= $_t['page.download-logo.title']; ?></h2>
                <!-- text about magazine -->
                <?= $dataCollection['text']; ?>

                <? if (!empty($dataCollection['files'])): ?>

                    <ul class="downloads">
                        <? foreach ($dataCollection['files'] as $file): ?>
                            <li><a href="<?= PUBLIC_UPLOAD_PATH . 'download' . DS . $file['file_name']; ?>" target="_blank"><?= $file['alias_name']; ?> (Download <?= $file['type']; ?>, <?= round($file['size'] / 1024, 2); ?> kB)</a></li>
                        <? endforeach; ?>
                    </ul>
                <? endif; ?>

                <? if (!empty($wDataCollection)): ?>
                    <h2><?= $_t['page.download-wallpapers.title']; ?></h2>
                    <ul class="magazines dloads">
                        <?$countMagazine=0;?>
                        <? foreach ($wDataCollection as $w): ?>
                            <li <? if($countMagazine++ >= 3){ echo 'class="last"'; $countMagazine=0;} ?>>
                                <img src="<?= PUBLIC_UPLOAD_PATH . 'download' . DS . $w['image_name']; ?>" />
                                <span>
                                    <? foreach ($w['images'] as $wd): ?>
                                        <a href="<?= PUBLIC_UPLOAD_PATH . 'download' . DS . $wd['image_name']; ?>" target="_blank"><?= $wd['group']; ?></a>
                                    <? endforeach; ?>
                                </span>
                            </li>
                        <? endforeach; ?>
                    </ul>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>