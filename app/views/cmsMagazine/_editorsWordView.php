<div id="fragment-5" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-5-1">Srpski</a></li>
            <li><a href="#fragment-5-2">English (optional)</a></li>
        </ul>
        <form name="wizard_editorsword" action="/cms/magazine/wizard/<?= @$params['id']; ?>" method="post" enctype="multipart/form-data">
            <div id="fragment-5-1" class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td><span class="jtooltip" title="Visible on home page">Short intro word:</span></td>
                            <td>
                                <textarea name="magazine[sr][editorsword_heading]" class="mceNoEditor"><?= @$magazine['editorsword_heading']['sr']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="jtooltip" title="Content tha will be visible on site">Editors word:</span></td>
                            <td>
                                <textarea name="magazine[sr][editorsword]"><?= @$magazine['editorsword']['sr']; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="fragment-5-2" class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td><span class="jtooltip" title="Visible on home page">Short intro word:</span></td>
                            <td>
                                <textarea name="magazine[en][editorsword_heading]" class="mceNoEditor"><?= @$magazine['editorsword_heading']['en']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="jtooltip" title="Content tha will be visible on site">Editors word:</span></td>
                            <td>
                                <textarea name="magazine[en][editorsword]"><?= @$magazine['editorsword']['en']; ?></textarea>
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
                                <? if (isset($magazine['id']) && !empty($magazine['index']['word_image_name'])): ?>
                                    <div class="jSubformImage">
                                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $magazine['index']['word_image_name']; ?>" target="_blank"><?= $magazine['index']['word_image_name']; ?></a>
                                        <a href="<?= DS . 'cms' . DS . 'magazine' . DS . 'wizard' . DS . $params['id'] . DS . 'editors-word' . DS . 'delete-image'; ?>" class="cmsDelete jw jSubfomDelete"></a>
                                    </div>
                                <? else: ?>
                                    <input type="file" name="image" value=""/>
                                <? endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td align="center">
                                <input type="submit" name="submit" value="Submit magazine"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" name="page" value="editorsword"/>
        </form>
    </div>
</div>