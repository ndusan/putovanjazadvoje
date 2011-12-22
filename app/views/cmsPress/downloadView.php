<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/press/download/add" >Add new download</a></li>
</ul>


<? if (!empty($downloadCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>File name</th>
                <th>Text</th>
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($downloadCollection as $d): ?>
                <tr> 
                    <td><?= $d['image_name']; ?></td> 
                    <td><?= $d['text']; ?></td> 
                    <td><?= $html->convertDate($d['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/press/download/edit/<?= $d['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/press/download/delete/<?= $d['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>File name</th> 
                <th>Text</th>
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

