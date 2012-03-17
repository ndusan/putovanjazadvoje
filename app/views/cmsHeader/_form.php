<div class="tabs">
    <form action="/cms/header/<?= $action; ?>" method="post" enctype="multipart/form-data">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="header[title]" value="<?= $header['title']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Link:</td>
                        <td>
                            <input type="text" name="header[link]" value="<?= $header['link']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Recommended image width 660px">Image:</span></td>
                        <td>
                            <? if (isset($header['id']) && !empty($header['image_name'])): ?>
                                <input type="file" name="image" value=""/>
                                <a href="<?= PUBLIC_UPLOAD_PATH . 'header' . DS . $header['image_name']; ?>" target="_blank"><?= $header['image_name']; ?></a>
                            <? else: ?>
                                <input type="file" name="image" value="" class="jr"/>
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="header[id]" value="<?= @$header['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

