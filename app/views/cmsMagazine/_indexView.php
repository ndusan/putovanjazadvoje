<div id="fragment-1" class="addContent">
    <form name="wizard_index" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>Actual number:</td>
                <td>
                    <input type="text" class="jr" name="magazine[number]" value="<?= @$magazine['index']['number']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td>

                    <? if (isset($magazine['id']) && !empty($magazine['index']['image_name'])): ?>
                        <input type="file" name="image" value=""/>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $magazine['index']['image_name']; ?>" target="_blank"><?= $magazine['index']['image_name']; ?></a>
                    <? else: ?>
                        <input type="file" name="image" value="" class="jr"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td>Header image:</td>
                <td>

                    <? if (isset($magazine['id']) && !empty($magazine['index']['header_image_name'])): ?>
                        <input type="file" name="image" value=""/>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $magazine['index']['header_image_name']; ?>" target="_blank"><?= $magazine['index']['header_image_name']; ?></a>
                    <? else: ?>
                        <input type="file" name="header_image" value="" class="jr"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                </td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="page" value="index"/>
    </form>
</div>