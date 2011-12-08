<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/background/add" >Add new background</a></li>
</ul>


<? if (!empty($backgroundCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>File name</th> 
                <th>Created</th> 
                <th>Active</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($backgroundCollection as $dic): ?>
                <tr> 
                    <td><?= $dic['name']; ?></td> 
                    <td><?= $html->convertDate($dic['created'], true); ?></td> 
                    <td><?= $dic['description']; ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/background/edit/<?= $dic['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/background/delete/<?= $dic['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>File name</th> 
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

