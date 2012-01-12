<a href="#" id="jremoveSubform" class="cmsDelete">Remove</a>
<div class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-topic-1">Srpski</a></li>
            <li><a href="#fragment-topic-2">English (optional)</a></li>
        </ul>
        <form action="/cms/magazine/wizard/topic-form/<?=$params['magazine_id'];?>/submit" method="post" enctype="multipart/form-data">
            <div class="addContent" id="fragment-topic-1">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="topic[sr][title]" value="<?= @$topic['sr']['title']; ?>" />
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
                                    <input type="file" name="image" value=""/>
                                    <a href="<?=DS.'public'.DS.'uploads'.DS.'magazine'.DS.$topic['image_name'];?>" class="jImage"><?= $topic['image_name']; ?></a>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . 'wizard'.DS.'topic-image'.DS.$topic['magazine_id'].DS.'delete-image'.DS.'?id='.$topic['id']; ?>" class="cmsDelete jw jSubfomDelete jImage"></a>
                                <? else: ?>
                                    <input type="file" name="image" value=""/>
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
            </div>
        </form>
    </div>
</div>