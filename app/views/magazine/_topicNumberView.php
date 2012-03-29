<div class="breadcrumb">
    <a href="<?= DS . $params['lang']; ?>"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.actualedition.link']; ?> / <?= $_t['breadcrumb.topic.link']; ?>
</div>
<? if (!empty($magazineCollection)): ?>

    <div class="wys">
        <!-- Title-->
        <h1><?= $magazineCollection['topic_title']; ?></h1>   
        <!-- Content -->
        <?= $magazineCollection['topic_content']; ?>

        <? if (!empty($topicCollection)): ?>
            <? foreach ($topicCollection as $topic): ?>
        <div class="Onetopic">
                <!-- Title-->
                <h3><?= $topic['title']; ?></h3> 
                <? if(!empty($topic['image_name'])):?>
                <!-- Image -->
                <img src="<?= PUBLIC_UPLOAD_PATH . 'magazine' . DS . $topic['image_name']; ?>" />
                <? endif; ?>
                <!-- Content-->
                <?= $topic['content']; ?>
        </div>
            <? endforeach; ?>
        <? endif; ?>
    </div>
<? else: ?>       
    <div class="noResults">
        <?= $_t['magazine.sorry.label']; ?>
    </div>
<? endif; ?>
