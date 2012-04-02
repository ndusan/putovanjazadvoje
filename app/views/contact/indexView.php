<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.contact.link'];?>
            </div>
            <div class="wys">
                <?=$dataCollection['text'];?>
            </div>
            <? if (!empty($sent)): ?>
            <div class="success"><?=$_t['contactform.sent.label'];?></div>
            <? endif; ?>
                <h2><?=$_t['page.contactform.title'];?></h2>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'kontakt'; ?>" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label><?=$_t['contactform.name.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['contactform.company.label'];?></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[company]" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['contactform.city.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[city]" class="jr" value="" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['contactform.country.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[country]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                             
                            <tr>
                                <td>
                                    <label>Email<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[email]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['contactform.message.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <textarea name="collection[message]" class="jr" rows="4" cols="20"></textarea><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td id="anti-spam"></td>
                                <td>
                                    <input type="text" name="anti-spam" id="form_spam" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
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