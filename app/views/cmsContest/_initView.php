<div id="fragment-1" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-1-1">Srpski</a></li>
            <li><a href="#fragment-1-2">English (optional)</a></li>
        </ul>
        <form name="wizard_init" action="/cms/contest/wizard" method="post" enctype="multipart/form-data">
        <div id="fragment-1-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Contest name:
                        </td>
                        <td>
                            <input type="text" value="" name="contest[sr][name]" class="jr-wizard_init" />
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Short description">Short description:</span></td>
                        <td>
                            <textarea name="contest[sr][desc]"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-1-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            Contest name:
                        </td>
                        <td>
                            <input type="text" name="contest[en][name]" value=""/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Short description">Short description:</span></td>
                        <td>
                            <textarea name="contest[en][desc]"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <span class="jtooltip" title="Image of sponzore or random image">Image:</span>
                        </td>
                        <td>
                            <input type="file" name="file" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="jtooltip" title="Set contest type">Contest type:</span>
                        </td>
                        <td>
                            <select name="contest[type]">
                                <option value="online">Online contest</option>
                                <option value="offline">Offline contest</option>
                            </select>
                        </td>
                    </tr>
                    <? if(!empty($magazineCollection)):?>
                    <tr>
                        <td>
                            <span class="jtooltip" title="Set to what magazine type is this contest related">Magazine number:</span>
                        </td>
                        <td>
                            <select name="contest[magazine]">
                                <option value="0">-- Select magazine --</option>
                                <? foreach($magazineCollection as $magazine):?>
                                <option value="<?=$magazine['id'];?>"><?=$magazine['number'];?></option>
                                <? endforeach;?>
                            </select>
                        </td>
                    </tr>
                    <? endif;?>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Set contest &raquo;" name="submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" value="init" name="page" />
        </form>
    </div>
</div>