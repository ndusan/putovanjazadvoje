<div class="addContent">
    <form action="/cms/download/wallpaper/<?= $action; ?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>Group</td>
                <td>Image</td>
            </tr>
            <tr>
                <td>800x600</td>
                <td>
                    <? if (!empty($wallpaper['800x600']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'download' . DS . $wallpaper['800x600']['image_name']; ?>" target="_blank"><?= $wallpaper['800x600']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'download'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['800x600']['download_id'].DS.'image'.DS.$wallpaper['800x600']['id'].'?group=800x600';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[800x600]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td>1024x768</td>
                <td>
                    <? if (!empty($wallpaper['1024x768']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'download' . DS . $wallpaper['1024x768']['image_name']; ?>" target="_blank"><?= $wallpaper['1024x768']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'download'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['1024x768']['download_id'].DS.'image'.DS.$wallpaper['1024x768']['id'].'?group=1024x768';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[1024x768]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td>1400x1900</td>
                <td>
                    <? if (!empty($wallpaper['1400x1900']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'download' . DS . $wallpaper['1400x1900']['image_name']; ?>" target="_blank"><?= $wallpaper['1400x1900']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'download'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['1400x1900']['download_id'].DS.'image'.DS.$wallpaper['1400x1900']['id'].'?group=1400x1900';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[1400x1900]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td>1600x1200</td>
                <td>
                    <? if (!empty($wallpaper['1600x1200']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'download' . DS . $wallpaper['1600x1200']['image_name']; ?>" target="_blank"><?= $wallpaper['1600x1200']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'download'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['1600x1200']['download_id'].DS.'image'.DS.$wallpaper['1600x1200']['id'].'?group=1600x1200';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[1600x1200]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="wallpaper[id]" value="<?= @$wallpaper['id']; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
