<? if (!empty($prizesCollection)): ?>
<form name="winners" action="/cms/contest/winners/<?=@$params['id'];?>" method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0"> 
    <thead> 
        <tr> 
            <th>Title</th> 
            <th>Description</th>
            <th>Created</th> 
            <th>Image</th>
            <th>Winners</th> 
        </tr> 
    </thead> 
    <tbody> 
        <? foreach ($prizesCollection as $t): ?>
            <tr> 
                <td><?= $t['title']; ?></td>
                <td><?= $t['content']; ?></td>
                <td><?= $html->convertDate($t['created'], true); ?></td>
                <td><img src="<?=PUBLIC_UPLOAD_PATH.'contest'.DS.$t['image_name'];?>" width="100" height="100" /></td>
                <td align="center">
                    <textarea name="winner[<?=$t['id'];?>]"><?=$t['winner'];?></textarea>
                </td> 
            </tr> 
        <? endforeach; ?>
    <tfoot> 
        <tr> 
            <th>Title</th> 
            <th>Description</th>
            <th>Created</th> 
            <th>Image</th>
            <th>Winners</th>
        </tr> 
    </tfoot> 
    </tbody> 
</table> 
    <input type="submit" name="submit" value="Submit"/>
</form>
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>