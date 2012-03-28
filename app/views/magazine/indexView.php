<div class="mainContent">
    <div class="contentBox">
        <!-- Links -->
        <div class="subNavigation">
            <? $getId = !empty($_GET) ? '?'.http_build_query($_GET) : ''; ?>
            <ul class="subNav">
                <li <?=isset($params['page']) && 'sadrzaj'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'sadrzaj'.$getId; ?>"><?=$_t['subnav.content.link'];?></a></li>
                <li <?=isset($params['page']) && 'impresum'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'impresum'.$getId; ?>"><?=$_t['subnav.impresum.link'];?></a></li>
                <li <?=isset($params['page']) && 'tema-broja'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'tema-broja'.$getId; ?>"><?=$_t['subnav.editiontopic.link'];?></a></li>
                <li <?=isset($params['page']) && 'rec-urednika'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'rec-urednika'.$getId; ?>"><?=$_t['subnav.editor.link'];?></a></li>
            </ul>
        </div>
        <div class="context oh">
            <!-- Load subview -->
            <? include_once $subpage . 'View.php'; ?>
        </div>
    </div>
</div>