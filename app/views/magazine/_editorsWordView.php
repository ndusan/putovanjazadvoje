<div class="breadcrumb">
    <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.actualedition.link']; ?> / <?= $_t['breadcrumb.editor.link']; ?>
</div>
<? if (!empty($magazineCollection)): ?>
    <div class="wys">
        <h1><?= $_t['subnav.editor.link']; ?></h1> 
        <? if (!empty($magazineCollection['word_image_name'])): ?>
            <img class="wysImg" src="<?= PUBLIC_UPLOAD_PATH . 'magazine' . DS . $magazineCollection['word_image_name']; ?>" />
        <? endif; ?>
        <?= $magazineCollection['word']; ?>
    </div>
<? else: ?>
    <div class="noResults">
        <?= $_t['magazine.sorry.label']; ?>
    </div>
<? endif; ?>
