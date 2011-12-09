<ul class="addTop">
    <li><a href="/cms/magazine" >Magazine</a></li>
    <li><h3>/ Add magazine</h3></li>
</ul>

<!-- Landing page ALWAYS SHOWING -->
<? include_once '_indexView.php';?>

<? if(!empty($params['id'])):?>
<!-- SHOWING ONLY IN EDIT MODE -->
    <!-- Content page -->
    <? include_once '_contentView.php';?>
    <!-- Impressum page -->
    <? include_once '_impressumView.php';?>
    <!-- Landing page -->
    <? include_once '_indexView.php';?>
    <!-- Topic number page -->
    <? include_once '_topicNumberView.php';?>
    <!-- Editors word page -->
    <? include_once '_editorsWordView.php';?>
<? endif; ?>