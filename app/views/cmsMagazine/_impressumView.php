<div id="fragment-3" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-3-1">Srpski</a></li>
            <li><a href="#fragment-3-2">English (optional)</a></li>
        </ul>
        <form name="wizard_impressum" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
        <div id="fragment-3-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Impressum:</span></td>
                        <td>
                            <textarea name="magazine[sr][impressum]"><?= @$magazine['sr']['impressum'];?></textarea>
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
                            <textarea name="magazine[en][impressum]"><?= @$magazine['en']['impressum'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="wizard-page" value="impressum"/>
        </form>
    </div>
</div>