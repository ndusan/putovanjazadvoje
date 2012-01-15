<div id="jPrizeRemove" class="cmsDelete"><!-- remove --></div>

<div id="fragment-4" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-4-1">Srpski</a></li>
            <li><a href="#fragment-4-2">English (optionsl)</a></li>
        </ul>
        
        <div id="fragment-4-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Define text about prize">Prize place:</span></td>
                        <td><input type="text" value="<?=@$prize['sr']['title'];?>" name="prize[sr][title]" class="jr-wizard_prize"/></td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Conditions for ONLINE contest">Conditions:</span></td>
                        <td>
                            <textarea name="prize[sr][content]"><?=@$prize['sr']['content'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-4-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Define text about prize">Prize place:</span></td>
                        <td><input type="text" name="prize[en][title]" value="<?=@$prize['en']['title'];?>"/></td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Conditions for ONLINE contest">Conditions:</span></td>
                        <td>
                            <textarea name="prize[en][content]"><?=@$prize['sr']['content'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Image about prize">Image place:</span></td>
                        <td>
                            <? if (!empty($prize['id']) && !empty($prize['prize_image_name'])): ?>
                                <div class="jPrizeImage">
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'contest' . DS . $prize['prize_image_name']; ?>" target="_blank"><?= $prize['prize_image_name']; ?></a>
                                    <a href="<?= DS . 'cms' . DS . 'contest' . DS . 'wizard' . DS . $prize['contest_id'] . DS . 'prize-form' . DS . 'delete-image' . DS . '?id=' . $prize['id']; ?>" class="cmsDelete jw jPrizeImageDelete"></a>
                                </div>
                            <? else: ?>
                                <input type="file" name="prize_image" value=""/>
                            <? endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="addContent">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?=$prize['id'];?>" />
                        <input type="submit" value="Create contest" name="submit"/>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>