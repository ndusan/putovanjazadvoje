<div class="breadcrumb">
    <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.actualedition.link'];?> / <?=$_t['breadcrumb.editor.link'];?>
</div>
<? if(!empty($magazineCollection)):?>

    <?=$magazineCollection['word'];?>

    <? if(!empty($magazineCollection['word_image_name'])):?>
    <img src="<?=PUBLIC_UPLOAD_PATH.'magazine'.DS.$magazineCollection['word_image_name'];?>" />
    <? endif; ?>

<? else:?>
    <div class="noResults">
        Sorry, no magazine to display
    </div>
<? endif; ?>
