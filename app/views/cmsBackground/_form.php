<div class="addContent">
    <form action="/cms/background/<?= $action; ?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>Link:</td>
                <td>
                    <input type="text" name="background[link]" value="<?=@$background['link']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td>

                    <? if (isset($background['id']) && !empty($background['image_name'])): ?>
                        <input type="file" name="image" value=""/>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'background' . DS . $background['image_name']; ?>" target="_blank"><?= $background['image_name']; ?></a>
                    <? else: ?>
                        <input type="file" name="image" value="" class="jr"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="background[id]" value="<?= @$background['id']; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
