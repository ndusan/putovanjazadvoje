<ul class="addTop">
    <li><a href="/cms/magazine" >Magazine</a></li>
    <li><h3>/ Add magazine</h3></li>
</ul>

<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Magazine</a></li>
        <? if(!empty($params['id'])):?>
        <li><a href="#fragment-2">Content</a></li>
        <li><a href="#fragment-3">Impressum</a></li>
        <li><a href="#fragment-4">Topic Number</a></li>
        <li><a href="#fragment-5">Editors Word</a></li>
        <? endif; ?>
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
        
</div>