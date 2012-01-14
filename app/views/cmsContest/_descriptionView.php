<div id="fragment-3" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-3-1">Srpski</a></li>
            <li><a href="#fragment-3-2">English (optional)</a></li>
        </ul>
        <form name="wizard_description" action="/cms/contest/wizard/<?=@$params['id'];?>" method="post" enctype="multipart/form-data">
        <div id="fragment-3-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Write here description of contest">Description:</span></td>
                        <td>
                            <textarea name="contest[sr][description]"><?=$contest['description']['sr'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-3-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Write here description of contest">Description:</span></td>
                        <td>
                            <textarea name="contest[en][description]"><?=$contest['description']['en'];?></textarea>
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
                            <span class="jtooltip" title="Puzzle image">Puzzle image:</span>
                        </td>
                        <td>
                            <? if (isset($contest['id']) && !empty($contest['init']['puzzle_image_name'])): ?>
                                <input type="file" name="puzzle_image" value=""/>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'contest' . DS . $contest['init']['puzzle_image_name']; ?>" target="_blank"><?=$contest['init']['puzzle_image_name']; ?></a>
                            <? else: ?>
                                <input type="file" name="puzzle_image" value="" <?=$contest['init']['type'] == 'online' ? 'class="jr-wizard_description"' : '';?>/>
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Set description &raquo;" name="Submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" value="description" name="page" />
        </form>
    </div>
</div>