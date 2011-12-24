<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/download/wallpaper/add" >Add new wallpaper</a></li>
</ul>


<? if (!empty($wallpaperCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Global image name</th> 
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($wallpaperCollection as $b): ?>
                <tr> 
                    <td><?= $b['image_name']; ?></td> 
                    <td><?= $html->convertDate($b['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/download/wallpaper/edit/<?= $b['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/download/wallpaper/delete/<?= $b['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Global image name</th> 
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

