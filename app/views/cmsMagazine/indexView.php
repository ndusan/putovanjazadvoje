<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/magazine/wizard" >Add new magazine</a></li>
</ul>


<? if (!empty($magazineCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Name</th> 
                <th>Visible</th>
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($magazineCollection as $m): ?>
                <tr> 
                    <td><?= $m['number']; ?></td> 
                    <td>
                        <input type="checkbox" <?=$m['visible']?'checked="checked"':'';?> onClick="window.location='<?=DS.'cms'.DS.'magazine?id='.$m['id'].'&visible='.$m['visible'];?>'; return true;"/>
                    </td> 
                    <td><?= $html->convertDate($m['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/magazine/wizard/<?= $m['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/magazine/delete/<?= $m['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Name</th>
                <th>Visible</th>
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </tfoot> 
    </tbody> 
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>