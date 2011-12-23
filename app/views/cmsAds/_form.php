<div class="addContent">
    <form action="/cms/ads/price-list/<?= $action; ?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>File:</td>
                <td>

                    <? if (isset($priceList['id']) && !empty($priceList['file_name'])): ?>
                        <input type="file" name="image" value=""/>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'ads' . DS . $priceList['file_name']; ?>" target="_blank"><?= $priceList['file_name']; ?></a>
                    <? else: ?>
                        <input type="file" name="image" value="" class="jr"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="priceList[id]" value="<?= @$priceList['id']; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
