<div class="mainContent">
    <div class="contentBox">
        <!-- Links -->
        <div class="subNavigation">
            <ul class="subNav">
                <li><a href="<?= DS . $params['lang'] . DS . 'broj-u-prodaji'; ?>">Home</a></li>
                <li><a href="<?= DS . $params['lang'] . DS . 'broj-u-prodaji' . DS . 'sadrzaj'; ?>">Sadrzaj</a></li>
                <li><a href="<?= DS . $params['lang'] . DS . 'broj-u-prodaji' . DS . 'impresum'; ?>">Impresum</a></li>
                <li><a href="<?= DS . $params['lang'] . DS . 'broj-u-prodaji' . DS . 'tema-broja'; ?>">Tema broja</a></li>
                <li><a href="<?= DS . $params['lang'] . DS . 'broj-u-prodaji' . DS . 'rec-urednika'; ?>">Rec urednika</a></li>
            </ul>
        </div>
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <!-- Load subview -->
            <? include_once $subpage . 'View.php'; ?>
        </div>
    </div>
</div>