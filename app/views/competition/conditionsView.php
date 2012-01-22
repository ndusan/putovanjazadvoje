<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?= DS . $params['lang']; ?>">Pocetna</a> / Magazin / O nama
            </div>
            <div class="forms">
                <form name="online_conditions" action="<?= DS . $params['lang'] . DS . 'nagradne-igre' . DS . 'online' . DS . $conditionCollection['id'] . DS . 'conditions'; ?>" method="post">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label>Ime:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="condition[firstname]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Prezime:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="condition[lastname]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Pol:<span>*</span></label>
                                </td>
                                <td>
                                    <select class="jr" name="condition[sex]">
                                        <option value="0">Odaberi pol</option>
                                        <option value="male">Muski</option>
                                        <option value="female">Zenski</option>
                                    </select>
                                    <span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="condition[email]" class="jr jCheckEmail" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Adresa:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="condition[address]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Conditions<span>*</span></label>
                                </td>
                                <td>
                                    <div class="conditions"><?= $conditionCollection['conditions']; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <input type="checkbox" name="accept" value="1" id="jCheckbox" />
                                </td>
                                <td>
                                    <label for="jCheckbox">Saglasan sam sa uslovima igre</label>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="hidden" name="condition[magazine]" value="<?=$conditionCollection['magazine_id'];?>"/>
                                    <input type="hidden" name="condition[contest]" value="<?=$conditionCollection['id'];?>"/>
                                    <input type="submit" name="submit" value="Play" disabled="disabled" id="jSubmit"/>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>