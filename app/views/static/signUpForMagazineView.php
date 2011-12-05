<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h1>Pretplati se na magazin</h1>
                <?= $collection['text']; ?>
            </div>
            <? if (!empty($sent)): ?>
                Poslato
            <? endif; ?>
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
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Firma:</label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>PIB:</label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Adresa:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Poštanski broj/PAK:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Grad:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Telefon:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>E-mail:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" />
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