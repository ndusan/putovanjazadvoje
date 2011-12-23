<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <?=$dataCollection['text'];?>
            </div>
            <? if (!empty($sent)): ?>
                Poslato
            <? endif; ?>
                <h2>Kontakt forma</h2>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'pretplati-se-na-magazin'; ?>" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label>Ime i prezime:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Firma:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[company]" class="jr" value="" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Poruka:<span>*</span></label>
                                </td>
                                <td>
                                    <textarea name="" class="jr" rows="4" cols="20"></textarea><span class="req">polje obavezno</span>
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