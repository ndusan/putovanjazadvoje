<ul class="addTop">
    <li><a href="/cms/contest">Contest</a></li>
    <li><h3>/ Define winners</h3></li>
</ul>
<div class="addContent">
    <? if (!empty($prizesCollection)): ?>
        <form name="winners" action="/cms/contest/winners/<?= @$params['id']; ?>" method="post" enctype="multipart/form-data">
            <table cellpadding="0" cellspacing="0"> 
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
                            <td><img src="<?= PUBLIC_UPLOAD_PATH . 'contest' . DS . $t['image_name']; ?>" width="100" height="100" /></td>
                            <td align="center">
                                <textarea name="winner[<?= $t['id']; ?>]"><?= $t['winner']; ?></textarea>
                            </td> 
                        </tr> 
                    <? endforeach; ?>
                </tbody> 
            </table> 
            <input type="submit" name="submit" value="Submit"/>
        </form>
    <? else: ?>
        <div class="noResults">
            There are no results on this page.
        </div>
    <? endif; ?>
</div>