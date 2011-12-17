<ul class="addTop">
    <li><a href="/cms/contact" >Contact</a></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms/contact" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Contact page">Description:</span></td>
                        <td>
                            <textarea name="contact[sr][text]" class="jr"><?= @$contact['sr']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Contact page">Description:</span></td>
                        <td>
                            <textarea name="contact[en][text]"><?= @$contact['en']['text'];?></textarea>
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
                            <input type="hidden" name="contact[id]" value="<?= @$contact['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>