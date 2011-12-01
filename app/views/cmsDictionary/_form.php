<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/dictionary/<?= $action; ?>" method="post">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Key has to be unique">Key:</span></td>
                        <td>
                            <input type="text" class="jr" name="dictionary[name]" value="<?= @$dictionary['name']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="dictionary[description]" ><?= @$dictionary['description'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Translation:</td>
                        <td>
                            <input type="text" class="jr" name="dictionary[lang][sr][text]" value="<?= @$dictionary['lang']['sr']['text']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Translation:</td>
                        <td>
                            <input type="text" name="dictionary[lang][en][text]" value="<?= @$dictionary['lang']['en']['text']; ?>" />
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
                            <input type="hidden" name="dictionary[id]" value="<?= @$dictionary['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
