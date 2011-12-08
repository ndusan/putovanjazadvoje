<!--Query -->
<? if(!empty($params['q'])):?>
    Criteria: <?=$params['q']; ?>
<? endif;?>

<? if(!empty($resultCollection)):?>
<!-- List of results START -->
<? foreach($resultCollection as $r):?>
    
    Results list

<? endforeach; ?>
<!-- List of results END -->

<? else: ?>
    
 Sorry, no results!

<? endif; ?>
