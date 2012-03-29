<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/sponsors/add" >Add new sponsor</a></li>
</ul>


<? if (!empty($sponsorCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr>
                <th>Sponsor name</th>
                <th>Image name</th>
                <th>Created</th>
                <th>Visible</th>
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($sponsorCollection as $sponsor): ?>
                <tr> 
                    <td><?=$sponsor['name'];?></td>
                    <td><?=$sponsor['image_name'];?></td>
                    <td><?=$html->convertDate($sponsor['created'], true);?></td>
                    <td><input type="checkbox" class="jVisible" name="visible" value="/cms/sponsors/visible/<?=$sponsor['id'];?>" <?=$sponsor['visible']?'checked="checked"':'';?></td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/sponsors/edit/<?= $sponsor['id']; ?>"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/sponsors/delete/<?= $sponsor['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Sponsor name</th>
                <th>Image name</th>
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

