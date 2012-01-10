<div id="fragment-5" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-5-1">Srpski</a></li>
            <li><a href="#fragment-5-2">English (optional)</a></li>
        </ul>
        <form name="wizard_editorsword" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
        <div id="fragment-5-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Editors word:</span></td>
                        <td>
                            <textarea name="magazine[sr][editorsword]"><?= @$magazine['sr']['editorsword'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-5-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Editors word:</span></td>
                        <td>
                            <textarea name="magazine[en][editorsword]"><?= @$magazine['en']['editorsword'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Image:</td>
                        <td>

                            <? if (isset($magazine['id']) && !empty($magazine['image_name'])): ?>
                                <input type="file" name="image" value=""/>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $magazine['image_name']; ?>" target="_blank"><?= $magazine['image_name']; ?></a>
                            <? else: ?>
                                <input type="file" name="image" value=""/>
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Submit magazine"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="wizard-page" value="editorsword"/>
        </form>
    </div>
</div>