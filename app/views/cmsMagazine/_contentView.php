<div id="fragment-2" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-2-1">Srpski</a></li>
            <li><a href="#fragment-2-2">English (optional)</a></li>
        </ul>
        <form name="wizard_content" action="/cms/magazine/wizard/<?=@$params['id'];?>" method="post" enctype="multipart/form-data">
            <div id="fragment-2-1" class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td><span class="jtooltip" title="Content visible on site">Content:</span></td>
                            <td>
                                <textarea name="magazine[sr][content]"><?= @$magazine['content']['sr']['content'];?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="fragment-2-2" class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td><span class="jtooltip" title="Content visible on site">Content:</span></td>
                            <td>
                                <textarea name="magazine[en][content]"><?= @$magazine['content']['en']['content'];?></textarea>
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
            <input type="hidden" name="page" value="content"/>
        </form>
    </div>
</div>