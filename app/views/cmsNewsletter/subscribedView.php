<? if (!empty($subscribedCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Email</th> 
                <th>Created</th>
                <th>Status</th>
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($subscribedCollection as $s): ?>
                <tr> 
                    <td><?=$s['email'];?></td>
                    <td><?=$html->convertDate($s['created'], true);?></td>
                    <td><?=$s['status'];?></td>
                    <td align="center">
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/newsletter/delete/<?= $s['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Email</th> 
                <th>Created</th> 
                <th>Status</th>
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

