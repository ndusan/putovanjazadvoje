<ul class="addTop">
    <li><a href="/cms/contest" >Contest</a></li>
    <li><h3>/ Add contest</h3></li>
</ul>

<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Init contest</a></li>
        <? if(!empty($params['id'])):?>
        <li><a href="#fragment-2">Conditions</a></li>
        <li><a href="#fragment-3">Description</a></li>
        <li><a href="#fragment-4">Prizes</a></li>
        <? endif; ?>
    </ul>
    
    <!-- Landing page ALWAYS SHOWING -->
    <? include_once '_initView.php';?>
    
    <? if(!empty($params['id'])):?>
    <!-- SHOWING ONLY IN EDIT MODE -->
        <? include_once '_conditionsView.php';?>
        <? include_once '_descriptionView.php';?>
        <? include_once '_prizesView.php';?>
    <? endif; ?>
</div>