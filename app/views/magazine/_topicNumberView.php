<div class="breadcrumb">
    <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.actualedition.link'];?> / <?=$_t['breadcrumb.topic.link'];?>
</div>
<? if(!empty($magazineCollection)):?>


    <!-- Title-->
    <?=$magazineCollection['topic_title'];?>

    <!-- Content -->
    <?=$magazineCollection['topic_content'];?>

    <? if(!empty($topicCollection)):?>
    <? foreach($topicCollection as $topic):?>

        <!-- Title-->
        <?=$topic['title'];?>

        <!-- Content-->
        <?=$topic['content'];?>

        <!-- Image -->
        <img src="<?=PUBLIC_UPLOAD_PATH.'magazine'.DS.$topic['image_name'];?>" />

    <? endforeach;?>
    <? endif; ?>

<? else:?>       
    <div class="noResults">
        Sorry, no magazine to display
    </div>
<? endif; ?>
