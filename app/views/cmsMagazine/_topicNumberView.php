<div id="fragment-4" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-4-1">Srpski</a></li>
            <li><a href="#fragment-4-2">English (optional)</a></li>
        </ul>
        <form name="wizard_topicnumber" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
        <div id="fragment-4-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Topic content:</span></td>
                        <td>
                            <textarea name="magazine[sr][topicnumber]"><?= @$magazine['sr']['topicnumber'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-4-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Topic content:</span></td>
                        <td>
                            <textarea name="magazine[sr][topicnumber]"><?= @$magazine['en']['topicnumber'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="wizard-page" value="topicnumber"/>
        </form>
    </div>
</div>