<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.contact.link'];?>
            </div>
            <div class="wys">
                <?=$dataCollection['text'];?>
            </div>
            <? if (!empty($sent)): ?>
                <?=$_t['contactform.sent.label'];?>
            <? endif; ?>
                <h2><?=$_t['page.contactform.title'];?></h2>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'pretplati-se-na-magazin'; ?>" enctype="multipart/form-data">
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
                                    <label><?=$_t['contactform.company.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[company]" class="jr" value="" /><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><?=$_t['contactform.message.label'];?><span>*</span></label>
                                </td>
                                <td>
                                    <textarea name="" class="jr" rows="4" cols="20"></textarea><span class="req"><?=$_t['orderform.required.label'];?></span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Posalji" name="submit" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>