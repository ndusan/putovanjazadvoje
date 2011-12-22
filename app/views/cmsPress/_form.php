<div class="addContent">
    <form action="/cms/press/download/<?= $action; ?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>Text:</td>
                <td>
                    <input type="text" name="download[text]" value="<?=@$download['text']; ?>" class="jr" />
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td>

                    <? if (isset($download['id']) && !empty($download['image_name'])): ?>
                        <input type="file" name="image" value=""/>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'press' . DS . $download['image_name']; ?>" target="_blank"><?= $download['image_name']; ?></a>
                    <? else: ?>
                        <input type="file" name="image" value="" class="jr"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="download[id]" value="<?= @$download['id']; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
