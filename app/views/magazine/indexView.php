<div class="mainContent">
    <div class="contentBox">
        <!-- Links -->
        <div class="subNavigation">
            <ul class="subNav">
                <li <?=isset($params['page']) && 'sadrzaj'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'sadrzaj'; ?>"><?=$_t['subnav.content.link'];?></a></li>
                <li <?=isset($params['page']) && 'impresum'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'impresum'; ?>"><?=$_t['subnav.impresum.link'];?></a></li>
                <li <?=isset($params['page']) && 'tema-broja'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'tema-broja'; ?>"><?=$_t['subnav.editiontopic.link'];?></a></li>
                <li <?=isset($params['page']) && 'rec-urednika'==$params['page'] ? 'class="active"':'';?>><a href="<?= DS . $params['lang'].DS.'magazin' . DS . 'broj-u-prodaji' . DS . 'rec-urednika'; ?>"><?=$_t['subnav.editor.link'];?></a></li>
            </ul>
        </div>
        <div class="context">
            <!-- Load subview -->
            <? include_once $subpage . 'View.php'; ?>
        </div>
    </div>
</div>