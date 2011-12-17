<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/news/<?= $action; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="news[title][sr]" value="<?= @$news['lang']['sr']['title']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Heading:</td>
                        <td>
                            <input type="text" name="news[heading][sr]" value="<?= @$news['lang']['sr']['heading']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="news[content][sr]" class="jr"><?= @$news['lang']['sr']['text']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="news[title][en]" value="<?= @$news['lang']['en']['title']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Heading:</td>
                        <td>
                            <input type="text" name="news[heading][en]" value="<?= @$news['lang']['en']['heading']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="news[content][en]"><?= @$news['lang']['en']['text']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Maximum image width 530px">Image:</span></td>
                        <td>
                            <input type="file" name="image" value=""/>
                            <? if (isset($news['id']) && !empty($news['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'news' . DS . $news['image_name']; ?>" target="_blank"><?= $news['image_name']; ?></a>
                                [<a href="/cms/news/delete/image/<?= $news['id']; ?>" target="_blank">Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="news[id]" value="<?= @$news['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

