<div class="mainContent">
    <div class="contentBox">
        <!-- Links -->
        <div class="subNavigation">
            <ul class="subNav">
                <li><a <?=!isset($params['page']) ? 'class="active"':'';?> href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji'; ?>">Home</a></li>
                <li><a <?=isset($params['page']) && 'sadrzaj'==$params['page'] ? 'class="active"':'';?> href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'sadrzaj'; ?>">Sadrzaj</a></li>
                <li><a <?=isset($params['page']) && 'impresum'==$params['page'] ? 'class="active"':'';?> href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'impresum'; ?>">Impresum</a></li>
                <li><a <?=isset($params['page']) && 'tema-broja'==$params['page'] ? 'class="active"':'';?> href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'tema-broja'; ?>">Tema broja</a></li>
                <li><a <?=isset($params['page']) && 'rec-urednika'==$params['page'] ? 'class="active"':'';?> href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'rec-urednika'; ?>">Rec urednika</a></li>
            </ul>
        </div>
        <div class="context">
            <!-- Load subview -->
            <? include_once $subpage . 'View.php'; ?>
        </div>
    </div>
</div>