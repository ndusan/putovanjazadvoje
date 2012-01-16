<div class="breadcrumb">
    <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.actualedition.link'];?> / <?=$_t['breadcrumb.impressum.link'];?>
</div>
<? if(!empty($magazineCollection)):?>

    <?=$magazineCollection['impressum'];?>

<? else:?>
    <div class="noResults">
        Sorry, no magazine to display
    </div>
<? endif; ?>