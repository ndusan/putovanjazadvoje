<? if (!empty($playerCollection)): ?>
<ul class="addTop">
    <li><a href="/cms/contest" >Contest</a></li>
    <li><h3>/ Players</h3></li>
</ul>
<div>
    <a href="/cms/contest/players/<?=$params['id'];?>/export" target="_blank">Export to CVS</a>
</div>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
    <thead> 
        <tr>
            <th>Fistname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Sex</th>
            <th>Address</th>
            <th>Status</th>
            <th>Created</th>
      </tr> 
    </thead> 
    <tbody> 
        <? foreach ($playerCollection as $contest): ?>
            <tr> 
                <td><?=$contest['firstname'];?></td>
                <td><?=$contest['lastname'];?></td>
                <td><?=$contest['email'];?></td>
                <td><?=$contest['sex'];?></td>
                <td><?=$contest['address'];?></td>
                <td><?=$contest['closed']?'Closed':'Active';?></td>
                <td><?=$html->convertDate($contest['created'], true);?></td>
      </tr> 
        <? endforeach; ?>
    <tfoot> 
        <tr>
            <th>Fistname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Sex</th>
            <th>Address</th>
            <th>Status</th>
            <th>Created</th>
      </tr>  
    </tfoot> 
</tbody> 
</table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>