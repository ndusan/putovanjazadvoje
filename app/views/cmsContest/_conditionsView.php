<div id="fragment-2" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-2-1">Srpski</a></li>
            <li><a href="#fragment-2-2">English (optional)</a></li>
        </ul>
        <form name="wizard_content" action="/cms/contest/wizard/<?= @$params['id']; ?>" method="post" enctype="multipart/form-data">
            <div id="fragment-2-1" class="addContent">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td><span class="jtooltip" title="Conditions for ONLINE contest">Conditions:</span></td>
                            <td>
                                <textarea name="contest[sr][conditions]"><?= $contest['conditions']['sr']; ?></textarea>
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
                                <textarea name="contest[en][conditions]"><?= $contest['conditions']['en']; ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="addContent">
                <table cellpadding="0" cellspacing="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width:90px;">
                               Sponsor: 
                            </td>
                            <td>
                                <? if(!empty($sponsorCollection)):?>
                                <select name="contest[sponsor]">
                                    <? foreach ($sponsorCollection as $sponsor):?>
                                    <option value="<?=$sponsor['id'];?>" <?=@$contest['init']['sponsor_id']==$sponsor['id'] ? 'selected="selected"':''; ?>><?=$sponsor['name'];?></option>
                                    <? endforeach;?>
                                </select>
                                <? else: ?>
                                Please, add sponsor!
                                <? endif;?>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                                <input type="submit" value="Submit" name="submit"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type="hidden" value="conditions" name="page" />
        </form>
    </div>
</div>