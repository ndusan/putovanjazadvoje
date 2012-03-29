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
                                <input type="text" value="<?= @$contest['init']['name']['sr']; ?>" name="contest[sr][name]" class="jr-wizard_init" />
                            </td>
                        </tr>
                        <tr>
                            <td><span class="jtooltip" title="Short description">Short description:</span></td>
                            <td>
                                <textarea name="contest[sr][content]"><?= @$contest['init']['content']['sr']; ?></textarea>
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
                                <input type="text" name="contest[en][name]" value="<?= @$contest['init']['name']['en']; ?>"/>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="jtooltip" title="Short description">Short description:</span></td>
                            <td>
                                <textarea name="contest[en][content]"><?= @$contest['init']['content']['en']; ?></textarea>
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
                                <span class="jtooltip" title="Image visible on game intro">Image:</span>
                            </td>
                            <td>
                                <? if (isset($contest['id']) && !empty($contest['init']['image_name'])): ?>
                                    <input type="file" name="image" value=""/>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'contest' . DS . $contest['init']['image_name']; ?>" target="_blank"><?= $contest['init']['image_name']; ?></a>
                                <? else: ?>
                                    <input type="file" name="image" value="" class="jr-wizard_init"/>
                                <? endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="jtooltip" title="Set contest type">Contest type:</span>
                            </td>
                            <td>
                                <select name="contest[type]">
                                    <option value="online" <?= $contest['init']['type'] == 'online' ? 'selected="selected"' : ''; ?>>Online contest</option>
                                    <option value="offline" <?= $contest['init']['type'] == 'offline' ? 'selected="selected"' : ''; ?>>Offline contest</option>
                                </select>
                            </td>
                        </tr>
                        <? if (!empty($magazineCollection)): ?>
                            <tr>
                                <td>
                                    <span class="jtooltip" title="Set to what magazine type is this contest related">Magazine number:</span>
                                </td>
                                <td>
                                    <select name="contest[magazine]">
                                        <? foreach ($magazineCollection as $magazine): ?>
                                            <?
                                            if ($magazine['id'] == $contest['init']['magazine_id'])
                                                $sel = 'selected="selected"';
                                            else
                                                $sel='';
                                            ?>
                                            <option value="<?= $magazine['id']; ?>" <?= $sel; ?>><?= $magazine['number']; ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="addContent">
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <input type="hidden" value="<?= @$params['id']; ?>" name="contest[id]" />
                                        <input type="submit" value="Submit" name="submit"/>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <? else: ?>
                    <div>You need to define magazine first.</div>
                <? endif; ?>
                </tbody>
                </table>
            </div>
            <input type="hidden" value="init" name="page" />
        </form>
    </div>
</div>