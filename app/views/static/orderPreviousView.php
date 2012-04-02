<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?= $_t['breadcrumb.magazine.link']; ?> / <?= $_t['breadcrumb.orderprev.link']; ?>
            </div>
            <div class="wys">
                <h1><?= $_t['page.orderprev.title']; ?></h1>
            </div>
            <? if (!empty($sent)): ?>
                <div class="success">
                    <?= $_t['orderform.sent.label']; ?>
                </div>
            <? endif; ?>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS. 'magazin' . DS . 'naruci-ranije-brojeve'; ?>" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label><?= $_t['orderform.name.label']; ?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">
                                    <label><?= $_t['orderform.company.label']; ?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[company]" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.vatID.label']; ?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[pin]"  value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.address.label']; ?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[address]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.postalcode.label']; ?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[pak]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.city.label']; ?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[city]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.phone.label']; ?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[telephone]" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.email.label']; ?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[email]" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td id="anti-spam"></td>
                                <td>
                                    <input type="text" name="anti-spam" id="form_spam" class="jr" value="" /><span class="req"><?= $_t['orderform.required.label']; ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?= $_t['orderform.previouseditions.label']; ?><span>*</span></label>
                                </td>
                                <? if (!empty($magazineCollection)): ?>
                                    <td>
                                        <ul class="orderSelect">
                                            <? foreach ($magazineCollection as $magazine): ?>
                                                <li><input type="checkbox" name="collection[magazine][<?= $magazine['id']; ?>]" value="<?= $magazine['number']; ?>" <?=$magazine['visible']==0?'disabled="disabled"':''?> /><span><?= $magazine['number']; ?></span></li>
                                            <? endforeach; ?>
                                        </ul>
                                        <span class="req"><?= $_t['orderform.required.label']; ?></span>
                                    </td>
                                <? endif; ?>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="small"><?= $_t['orderform.required-info.label']; ?></span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="<?= $_t['orderform.buttonsend.label']; ?>" name="submit" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
            <div class="wys">
                <?= $collection['text']; ?>
            </div>
            <? if (!empty($magazineCollection)): ?>
                <ul class="magazines">
                    <? $countMagazine = 0; ?>
                    <? foreach ($magazineCollection as $magazine): ?>
                        <li <? if ($countMagazine++ >= 5) {
                    echo 'class="last"';
                    $countMagazine = 0;
                } ?>>
                            <a href="<?= DS . $params['lang'] . DS . 'magazin' . DS . 'broj-u-prodaji' . DS . 'sadrzaj?id=' . $magazine['id']; ?>">
                                <img src="<?= PUBLIC_UPLOAD_PATH . 'magazine' . DS . 'thumb-' . $magazine['image_name']; ?>" <?=$magazine['visible']==0?'class="disabled"':''?>/>
                            </a>
                            <h4><?= $magazine['number']; ?></h4>
                        </li>
    <? endforeach; ?>
                </ul>
<? endif; ?>
        </div>
    </div>
</div>