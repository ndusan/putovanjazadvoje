<div id="fragment-1" class="addContent">
    <form name="wizard_index" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>Actual number:</td>
                <td>
                    <input type="text" class="jr" name="magazine[number]" value="<?= @$magazine['number']; ?>" />
                </td>
            </tr>
            <tr>
                <td>Image:</td>
                <td>

                    <? if (isset($magazine['id']) && !empty($magazine['image_name'])): ?>
                        <input type="file" name="image" value=""/>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $magazine['image_name']; ?>" target="_blank"><?= $magazine['image_name']; ?></a>
                    <? else: ?>
                        <input type="file" name="image" value="" class="jr"/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="magazine[id]" value="<?= @$magazine['id']; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    <input type="hidden" name="wizard-page" value="index"/>
    </form>
</div>