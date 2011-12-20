<ul class="addTop">
    <li><a href="/cms/ads/terms-and-conditions" >Ads</a></li>
    <li><h3>/ Terms and conditions:</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms/ads/terms-and-conditions" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Download page">Description:</span></td>
                        <td>
                            <textarea name="termsandconditions[sr][text]" class="jr"><?= @$termsandconditions['sr']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Download page">Description:</span></td>
                        <td>
                            <textarea name="termsandconditions[en][text]"><?= @$termsandconditions['en']['text'];?></textarea>
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
                            <input type="hidden" name="termsandconditions[id]" value="<?= @$termsandconditions['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>