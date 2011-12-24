<div class="navigation">
    <ul class="mainNav">
        <li><a class="home" href="<?=DS.$params['lang'];?>"></a></li>
        <li><a href="#"><?=$_t['nav.mag.l'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'o-nama';?>"><?=$_t['nav.about.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji';?>"><?=$_t['nav.edit-sale.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pretplati-se-na-magazin';?>"><?=$_t['nav.sub.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'naruci-ranije-brojeve';?>"><?=$_t['nav.order.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pokloni-pretplatu';?>"><?=$_t['nav.gift.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'arhiva-izdanja';?>"><?=$_t['nav.arch.link'];?></a></li>
            </ul>
        </li>
        <li><a href="<?=DS.$params['lang'].DS.'aktuelno';?>"><?=$_t['nav.act.l'];?></a></li>
        <li><a href="#"><?=$_t['nav.conts.l'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'dobitnici-nagradnih-igara';?>"><?=$_t['nav.winners.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'foto-naticanje';?>"><?=$_t['nav.photo.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'gde-smo';?>"><?=$_t['nav.wherecontest.link'];?></a></li>
            </ul>
        </li>
        <li><a href="#"><?=$_t['nav.press.l'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'press'.DS.'o-magazinu';?>"><?=$_t['nav.about-m.link'];?></a></li>
            </ul>
        </li>
        <li><a href="#"><?=$_t['nav.adv.l'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'oglasavanje'.DS.'opsti-uslovi-i-informacije';?>"><?=$_t['nav.conditions.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'oglasavanje'.DS.'cenovnik-i-formati';?>"><?=$_t['nav.prices.link'];?></a></li>
            </ul>
        </li>
        <li><a href="<?=DS.$params['lang'].DS.'preuzimanje';?>"><?=$_t['nav.dow.l'];?></a></li>
        <li><a href="<?=DS.$params['lang'].DS.'kontakt';?>"><?=$_t['nav.conct.l'];?></a></li>
    </ul>
    <ul class="lang">
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'sr' ? 'class="active"':'');?> href="<?=DS.'sr'.DS.implode('/', $params['breadcrumb']);?>">SR</a></li>
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'en' ? 'class="active"':'');?> href="<?=DS.'en'.DS.implode('/', $params['breadcrumb']);?>">EN</a></li>
    </ul>
</div>