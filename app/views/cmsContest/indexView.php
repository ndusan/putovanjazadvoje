<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/contest/wizard" >Add new contest</a></li>
</ul>
<? if (!empty($contestCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Created</th>
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($contestCollection as $contest): ?>
                <tr> 
                    <td><?=$contest['name'];?></td>
                    <td><?=$contest['type'];?></td>
                    <td><?=$html->convertDate($contest['created'], true);?></td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/contest/wizard/<?= $contest['id']; ?>"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/contest/delete/<?= $contest['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Name</th>
                <th>Type</th>
                <th>Created</th> 
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

