<div class="tabs">
    <form action="/cms/sponsors/<?= $action; ?>" method="post" enctype="multipart/form-data">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Sponsor image">Image:</span></td>
                        <td>
                            <input type="file" name="image" value="" class="jr"/>
                            <? if (isset($sponsor['id']) && !empty($sponsor['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'sponsors' . DS . $sponsor['image_name']; ?>" target="_blank"><?= $sponsor['image_name']; ?></a>
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="sponsor[id]" value="<?= $sponsor['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

