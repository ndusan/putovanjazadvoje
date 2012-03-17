<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/header/add" >Add new header</a></li>
</ul>


<? if (!empty($headerCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Title</th> 
                <th>Link</th>
                <th>Created</th>
                <th width="20px;">Visible</th>
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($headerCollection as $header): ?>
                <tr> 
                    <td><?=$header['title'];?></td>
                    <td><?=$header['link'];?></td>
                    <td><?=$html->convertDate($header['created'], true);?></td>
                    <td align="center"><input type="radio" name="visible" value="/cms/header?id=<?=$header['id'];?>" <?=$header['visible'] ? 'checked="checked"' : '';?></td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/header/edit/<?= $header['id']; ?>"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/header/delete/<?= $header['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Title</th> 
                <th>Link</th>
                <th>Created</th> 
                <th>Visible</th>
                <th>Action</th> 
            </tr> 
        </tfoot> 
    </tbody> 
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>

