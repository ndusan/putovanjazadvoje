<div id="fragment-4" class="addContent">
    <form name="wizard_topicnumber" action="/cms/magazine/wizard" method="post" enctype="multipart/form-data">
    <div class="addContent">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td><span class="jtooltip" title="Content tha will be visible on site">Content:</span></td>
                    <td>
                        <textarea name="magazine[sr][topicnumber]"><?= @$magazine['sr']['topicnumber'];?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <input type="hidden" name="wizard-page" value="topicnumber"/>
    </form>
</div>