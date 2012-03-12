<div class="breadcrumb">
    <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.actualedition.link']; ?> / <?= $_t['breadcrumb.content.link']; ?>
</div>

<? if (!empty($magazineCollection)): ?>
    <div class="contextMain">
        <div class="wys">
            <h1><?= $_t['magazine.content.title']; ?></h1>    
            <?= $magazineCollection['content']; ?>
        </div>
    </div>
    <div class="contextSidebar">
        <div class="wys">
            <h1><?= $magazineCollection['number']; ?></h1>
        </div>
        <img src="<?= PUBLIC_UPLOAD_PATH . 'magazine' . DS . $magazineCollection['image_name']; ?>" />
        <ul class="sidebarLinks">
            <li class="blue"><a href="<?= DS . $params['lang'] . DS . 'magazin' . DS . 'pretplati-se-na-magazin'; ?>"><?= $_t['magazine.print-ed.link']; ?></a></li>
            <li class="green"><a href="<?= DS . $params['lang'] . DS . 'magazin' . DS . 'arhiva-izdanja'; ?>"><?= $_t['magazine.archive.link']; ?></a></li>
        </ul>
    </div>
<? else: ?>
    <div class="noResults">
        <?= $_t['magazine.sorry.label']; ?>
    </div>
<? endif; ?>

