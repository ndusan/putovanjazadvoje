<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/dictionary/add" >Add new translation</a></li>
</ul>


<? if (!empty($dictionaryCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Key name</th> 
                <th>Description</th> 
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($dictionaryCollection as $dic): ?>
                <tr> 
                    <td><?= $dic['name']; ?></td> 
                    <td><?= $dic['description']; ?></td> 
                    <td><?= $html->convertDate($dic['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/dictionary/edit/<?= $dic['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/dictionary/delete/<?= $dic['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Key name</th> 
                <th>Description</th> 
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

