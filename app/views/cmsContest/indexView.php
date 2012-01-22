<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/contest/wizard" >Add new contest</a></li>
</ul>
<? if (!empty($contestCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Magazine number</th>
                <th>Created</th>
                <th>Status</th>
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($contestCollection as $contest): ?>
                <tr> 
                    <td><?=$contest['name'];?></td>
                    <td><?=$contest['type'];?></td>
                    <td><?=$contest['number'];?></td>
                    <td><?=$html->convertDate($contest['created'], true);?></td>
                    <td>
                        <? 
                        //!!!! DONT CHANGE VALUE OF THIS ARRAY -> IT's REALATE TO DB VALUES!!
                        $status = array('pending'=>'Pending', 'active'=>'Active', 'finished'=>'Finished', 'archived'=>'Archived');?>
                        <select class="jStatus">
                            <? foreach ($status as $k=>$v):?>
                            <? if($k == $contest['status']) $sel = 'selected="selected"';
                               else $sel = '';?>
                            <option value="<?=DS.'cms'.DS.'contest?id='.$contest['id'].'&status='.$k;?>" <?=$sel;?>><?=$v;?></option>
                            <? endforeach;?>
                        </select>
                        <span><a class="cmsAdd" style="line-height:20px; display:inline-block;" href="/cms/contest/winners/<?=$contest['id'];?>">Define winners</a></span>
                        <span><a class="cmsAdd" style="line-height:20px; display:inline-block;" href="/cms/contest/players/<?=$contest['id'];?>">Export</a></span>
                    </td>
                    <td align="center">
                        <!--Winners-->
                        
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
                <th>Magazine number</th>
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

