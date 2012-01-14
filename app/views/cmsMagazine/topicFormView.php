<div class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-topic-1">Srpski</a></li>
            <li><a href="#fragment-topic-2">English (optional)</a></li>
        </ul>
        <form name="wizard_topic" action="/cms/magazine/wizard/<?= @$params['magazine_id']; ?>/topic-form/submit" method="post" enctype="multipart/form-data">
            <div class="addContent" id="fragment-topic-1">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="topic[sr][title]" class="jr-wizard_topic" value="<?= @$topic['sr']['title']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Content:</td>
                            <td>
                                <textarea name="topic[sr][content]" ><?= @$topic['sr']['content']; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="addContent" id="fragment-topic-2">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="topic[en][title]" value="<?= @$topic['en']['title']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Content:</td>
                            <td>
                                <textarea name="topic[en][content]" ><?= @$topic['en']['content']; ?></textarea>
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
                                <? if (!empty($topic['id']) && !empty($topic['image_name'])): ?>
                                    <div class="jSubformImage">
                                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $topic['image_name']; ?>" target="_blank"><?= $topic['image_name']; ?></a>
                                        <a href="<?= DS . 'cms' . DS . 'magazine' . DS . 'wizard' . DS . $topic['magazine_id'] . DS . 'topic-form' . DS . 'delete-image' . DS . '?id=' . $topic['id']; ?>" class="cmsDelete jw jSubfomDelete"></a>
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
                            <td align="right" width="50%">
                                <input id="jremoveSubform" type="submit" value="Cancel" name="cancel" />
                            </td>
                            <td align="left">
                                <input type="hidden" value="<?= @$params['id']; ?>" name="id" />
                                <input type="submit" value="Save Topic" name="submit" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>