<ul class="addTop">
    <li><a href="/cms/static/about-us" >Static content</a></li>
    <li><h3>/ About Us:</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms/static/about-us" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on About Us page">Description:</span></td>
                        <td>
                            <textarea name="aboutus[sr][text]" class="jr"><?= @$aboutus['sr']['text'];?></textarea>
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
                            <textarea name="aboutus[en][text]"><?= @$aboutus['en']['text'];?></textarea>
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
                            <input type="hidden" name="aboutus[id]" value="<?= @$aboutus['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>