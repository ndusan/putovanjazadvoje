<div id="container">
    <!-- Image Puzzle -->
    <div id="puzzle">
        <!-- Image Puzzle -->
        <ul id="sortable" style="background:url(<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$play['game']['puzzle_image_name']; ?>) center center no-repeat; width:500px; height:500px;">
            <? if($play['player']['closed'] == 0):?>
            <div id="start">Click to Start</div>
            <? else: ?>
            <div class="completed">Congratulations! <a href="<?= DS . $params['lang']; ?>">Click here to go on homepage.</div>
            <? endif;?>
        </ul>
        <!-- Puzzle Stats -->
        <div id="stats">
            <span id="moves">0</span> moves
            <span id="time">0</span> seconds
        </div>
    </div>
</div>
<div class="containerSide">
    <h1><?=$play['game']['name']?></h1>
    <?=$play['game']['description'];?>
    <? if(!empty($play['game']['puzzle_image_name'])):?>
    <img width=300" height="300" src="<?= PUBLIC_UPLOAD_PATH.'contest'.DS.$play['game']['puzzle_image_name']; ?>" />
    <? endif;?>
</div>

<script type="text/javascript">
    App.Competition = App.Competition || {};
    //This needs to be translated
    App.Competition.completed = 'Congratulations! <a href="<?= DS . $params['lang']; ?>">Click here to go on homepage.</a>';
    App.Competition.data = <?=json_encode(array('url'=>DS.$params['lang'].DS.'nagradne-igre'.DS.'online'.DS.$play['game']['id'].DS.'play',
                                                'contest'=>$play['game']['id'],
                                                'tocken'=>$params['tocken'],
                                                'closed'=>$play['player']['closed']))?>;
</script>