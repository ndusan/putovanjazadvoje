<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.press.link']; ?> / <?= $_t['breadcrumb.about-magazine.link']; ?>
            </div>
            <div class="wys">
                <h2><?= $_t['press.about.title']; ?></h2>
                <!-- text about magazine -->
                <?= $dataCollection['text']; ?>
            </div>
            <? if (!empty($dataCollection['files'])): ?>
                <ul class="downloads">
                    <? foreach ($dataCollection['files'] as $file): ?>
                        <li><a href="<?= PUBLIC_UPLOAD_PATH . 'press' . DS . $file['file_name']; ?>" target="_blank"><?= $file['alias_name']; ?> (Download <?= $file['type']; ?>, <?= round($file['size'] / 1024, 2); ?> kB)</a></li>
                    <? endforeach; ?>
                </ul>
            <? endif; ?>
        </div>
    </div>
</div>