<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.magazine.link'];?> / <?=$_t['breadcrumb.orderprev.link'];?>
            </div>
            <div class="wys">
                <h1><?=$_t['page.orderprev.title'];?></h1>
            </div>
            <? if (!empty($sent)): ?>
                <?=$_t['orderform.sent.label'];?>
            <? endif; ?>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'naruci-ranije-brojeve'; ?>" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label><?=$_t['orderform.name.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">
                                    <label><?=$_t['orderform.company.label'];?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[company]" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.vatID.label'];?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[pin]"  value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.address.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[address]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.postalcode.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[pak]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.city.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[city]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.phone.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[telephone]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.email.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[email]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.previouseditions.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <ul class="orderSelect">
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 01</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 02</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 03</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 01</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 02</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 03</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 01</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 02</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 03</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 01</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 02</span></li>
                                        <li><input type="checkbox" name="" value="ON" /><span>Br 03</span></li>
                                    </ul>
                                    <span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="small"><?=$_t['orderform.required-info.label'];?></span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="<?=$_t['orderform.buttonsend.label'];?>" name="submit" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
            <div class="wys">
                <?= $collection['text']; ?>
            </div>
            <ul class="magazines">
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 01</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 02</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 03</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 04</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 05</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 06</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 07</h4>
                </li>
                <li>
                    <a href="">
                        <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    </a>
                    <h4>BR 08</h4>
                </li>
            </ul>
        </div>
    </div>
</div>