<a href="#" id="jremoveSubform" class="cmsDelete">Remove</a>
<div class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-topic-1">Srpski</a></li>
            <li><a href="#fragment-topic-2">English (optional)</a></li>
        </ul>
        <form action="/cms/magazine/wizard/<?=$params['magazine_id'];?>/topic" method="post" enctype="multipart/form-data">
            <div class="addContent" id="fragment-topic-1">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="topic[title]" value="<?= @$topic['title']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Content:</td>
                            <td>
                                <textarea name="topic[title]" ><?= @$topic['title']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Image:</td>
                            <td>

                                <? if (isset($topic['id']) && !empty($topic['image_name'])): ?>
                                    <input type="file" name="image" value=""/>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $$topic['image_name']; ?>" target="_blank"><?= $$topic['image_name']; ?></a>
                                <? else: ?>
                                    <input type="file" name="image" value=""/>
                                <? endif; ?>
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
                                <input type="text" name="topic[title]" value="<?= @$topic['title']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>Content:</td>
                            <td>
                                <textarea name="topic[title]" ><?= @$topic['title']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Image:</td>
                            <td>

                                <? if (isset($topic['id']) && !empty($topic['image_name'])): ?>
                                    <input type="file" name="image" value=""/>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'magazine' . DS . $$topic['image_name']; ?>" target="_blank"><?= $$topic['image_name']; ?></a>
                                <? else: ?>
                                    <input type="file" name="image" value=""/>
                                <? endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
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