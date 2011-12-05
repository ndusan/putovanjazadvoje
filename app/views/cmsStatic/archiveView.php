<ul class="addTop">
    <li><a href="/cms/static/archive" >Static content</a></li>
    <li><h3>/ Archive:</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms/static/archive" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Archive">Description:</span></td>
                        <td>
                            <textarea name="archive[sr][text]" class="jr"><?= @$archive['sr']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on About Us page">Description:</span></td>
                        <td>
                            <textarea name="archive[en][text]"><?= @$archive['en']['text'];?></textarea>
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
                            <input type="hidden" name="archive[id]" value="<?= @$archive['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>