<div class="breadcrumb">
    <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.magazine.link'];?> / <?= $_t['breadcrumb.actualedition.link']; ?> / <?= $_t['breadcrumb.impressum.link']; ?>
</div>
<? if (!empty($magazineCollection)): ?>
    <div class="wys">
        <h1>Impressum</h1>    
        <?= $magazineCollection['impressum']; ?>
    </div>
<? else: ?>
    <div class="noResults">
        <?= $_t['magazine.sorry.label']; ?>
    </div>
<? endif; ?>