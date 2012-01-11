<div id="fragment-3" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-3-1">Srpski</a></li>
            <li><a href="#fragment-3-2">English (optional)</a></li>
        </ul>
        <form name="wizard_impressum" action="/cms/magazine/wizard/<?=@$params['id'];?>" method="post" enctype="multipart/form-data">
        <div id="fragment-3-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Impressum:</span></td>
                        <td>
                            <textarea name="magazine[sr][impressum]"><?= @$magazine['impressum']['sr'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-3-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Impressum:</span></td>
                        <td>
                            <textarea name="magazine[en][impressum]"><?= @$magazine['impressum']['en'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table>
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="page" value="impressum"/>
        </form>
    </div>
</div>