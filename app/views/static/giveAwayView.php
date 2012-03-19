<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.magazine.link'];?> / <?=$_t['breadcrumb.giftsub.link'];?>
            </div>
            <div class="wys">
                <h1><?=$_t['page.giftsub.title'];?></h1>
                <? if(!empty($magazineCollection)):?>
                <ul class="magazines">
                    <?$countMagazine=0;?>
                    <? foreach($magazineCollection as $magazine):?>
                    <li <? if($countMagazine++ >= 6){ echo 'class="last"'; $countMagazine=0;} ?>>
                        <a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji'.DS.'sadrzaj?id='.$magazine['id'];?>">
                            <img src="<?= PUBLIC_UPLOAD_PATH .'magazine'.DS.'thumb-'.$magazine['image_name']; ?>" />
                        </a>
                        <h4><?=$magazine['number'];?></h4>
                    </li>
                    <? endforeach;?>
                </ul>
                <? endif;?>
                
                
                <?= $collection['text']; ?>
            </div>
            <? if (!empty($sent)): ?>
                <?=$_t['orderform.sent.label'];?>
            <? endif; ?>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'pokloni-pretplatu'; ?>" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th colspan="2"><h2><?=$_t['orderform.payerdata.label'];?></h2></th>
                        </tr>
                        </thead>
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
                                    <input type="text" name="collection[comapny]" value="" />
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
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="2"><h2><?=$_t['orderform.receiverdata.label'];?></h2></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label><?=$_t['orderform.name.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_name]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.company.label'];?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_company]" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.vatID.label'];?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_pin]" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.address.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_address]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.postalcode.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_pak]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.city.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_city]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.phone.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_telephone]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['orderform.email.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[receiver_email]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td id="anti-spam"></td>
                                <td>
                                    <input type="text" name="anti-spam" id="form_spam" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="small"><?=$_t['orderform.required-info.label'];?></span>
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