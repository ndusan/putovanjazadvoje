<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h1>Naruci ranije brojeve</h1>
            </div>
            <? if (!empty($sent)): ?>
                Poslato
            <? endif; ?>
            <div class="forms">
                <!-- Form -->
                <form method="post" action="/<?= $params['lang'] . DS . 'naruci-ranije-brojeve'; ?>" enctype="multipart/form-data">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td width="150">
                                    <label>Ime i prezime:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td width="150">
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
                                    <input type="text" name="collection[name]"  value="<?= @$collection['name']; ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Adresa:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Poštanski broj/PAK:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Grad:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Telefon:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>E-mail:<span>*</span></label>
                                </td>
                                <td>
                                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name']; ?>" /><span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Naručujem sledeće brojeve:<span>*</span></label>
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
                                    <span class="req">polje obavezno</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="small">Polja oznacena sa * su obavezna</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" value="Posalji" name="submit" />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
            <div class="wys">
                <?= $collection['text']; ?>
                <p>Stare brojeve možete kupiti u poslovnici turističke agencije 'Da da da d.o.o.'' Zagreb, Jurišićeva 2a, tel 01/ 4827-256, po cijeni od 15kn ili naručiti poštom po cijeni od 20kn s poštarinom.
                    Sve brojeve možete kupiti u internet izdanju na www.ikiosk.hr</p>
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