<div id="fragment-2" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-2-1">Srpski</a></li>
            <li><a href="#fragment-2-2">English (optional)</a></li>
        </ul>
        <form name="wizard_content" action="/cms/contest/wizard/<?=@$params['id'];?>" method="post" enctype="multipart/form-data">
        <div id="fragment-2-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Conditions for ONLINE contest">Conditions:</span></td>
                        <td>
                            <textarea name="contest[sr][conditions]"><?=$contest['conditions']['sr'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Conditions for ONLINE contest">Conditions:</span></td>
                        <td>
                            <textarea name="contest[en][conditions]"><?=$contest['conditions']['en'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Set conditions &raquo;" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" value="conditions" name="page" />
        </form>
    </div>
</div>