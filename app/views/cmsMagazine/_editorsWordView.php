<div id="fragment-5" class="addContent">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-5-1">Srpski</a></li>
            <li><a href="#fragment-5-2">English (optionsl)</a></li>
        </ul>
        <form name="wizard_editorsword" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
        <div id="fragment-5-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Content:</span></td>
                        <td>
                            <textarea name="magazine[sr][editorsword]"><?= @$magazine['sr']['editorsword'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-5-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Content:</span></td>
                        <td>
                            <textarea name="magazine[en][editorsword]"><?= @$magazine['en']['editorsword'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="wizard-page" value="editorsword"/>
        </form>
    </div>
</div>