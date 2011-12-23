<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/ads/price-list/add" >Add new price list</a></li>
</ul>


<? if (!empty($priceListCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>File name</th>
                <th>Type</th>
                <th>Size(kB)</th>
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($priceListCollection as $d): ?>
                <tr> 
                    <td><?= $d['file_name']; ?></td> 
                    <td><?= $d['type']; ?></td>
                    <td><?= $d['size']/1024; ?></td>
                    <td><?= $html->convertDate($d['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/ads/price-list/edit/<?= $d['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/ads/price-list/delete/<?= $d['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>File name</th> 
                <th>Type</th>
                <th>Size(kB)</th>
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

