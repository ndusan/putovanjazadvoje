<form name="online_conditions" action="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'online'.DS.$conditionCollection['id'].DS.'conditions';?>" method="post">
    <div><?=$conditionCollection['conditions'];?></div>
    <input type="checkbox" name="accept" value="1" id="jCheckbox"/>
    <input type="submit" name="submit" value="Play" disabled="disabled" id="jSubmit"/>
</form>