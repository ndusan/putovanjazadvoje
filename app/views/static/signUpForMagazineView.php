<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.magazine.link'];?> / <?=$_t['breadcrumb.subscribe.link'];?>
            </div>
            <div class="wys">
                <h1><?=$_t['title.subscribe.label'];?></h1>
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
                        <h4>BR 06</h4>
                    </li>
                </ul>
                <?= $collection['text']; ?>
            </div>
            <? if (!empty($sent)): ?>
                <?=$_t['orderform.sent.label'];?>
            <? endif; ?>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'pretplati-se-na-magazin'; ?>" enctype="multipart/form-data">
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
                                <td>
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
                                    <input type="text" name="collection[pin]" value="" />
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
                                <td colspan="2">
                                    <span class="small">Polja oznacena sa * su obavezna</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="<?=$_t['orderform.buttonsend.label'];?>" name="submit" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>