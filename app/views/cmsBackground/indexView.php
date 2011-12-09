<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/background/add" >Add new background</a></li>
</ul>


<? if (!empty($backgroundCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>File name</th>
                <th>Link</th>
                <th>Created</th> 
                <th>Active</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($backgroundCollection as $b): ?>
                <tr> 
                    <td><?= $b['image_name']; ?></td> 
                    <td><?= $b['link']; ?></td> 
                    <td><?= $html->convertDate($b['created'], true); ?></td> 
                    <td>
                        <input type="checkbox" name="active[<?=$b['id'];?>]" id="bg-<?=$b['id'];?>" class="bgActivate"  active="<?=($b['active']?'0':'1')?>" value="<?=$b['id'];?>" <?=($b['active']?'checked="checked"':'');?> />
                    </td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/background/edit/<?= $b['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/background/delete/<?= $b['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>File name</th> 
                <th>Link</th>
                <th>Created</th> 
                <th>Active</th> 
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

