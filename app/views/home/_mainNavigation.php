<div class="navigation">
    <ul class="mainNav">
        <li><a class="home" href="<?=DS.$params['lang'];?>"></a></li>
        <li><a href="#"><?=$_t['navigation.magazine.link'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'o-nama';?>"><?=$_t['navigation.aboutus.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji';?>"><?=$_t['navigation.editioninsale.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pretplati-se-na-magazin';?>"><?=$_t['navigation.subscribe.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'naruci-ranije-brojeve';?>"><?=$_t['navigation.orderprev.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pokloni-pretplatu';?>"><?=$_t['navigation.giftsub.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'arhiva-izdanja';?>"><?=$_t['navigation.archive.link'];?></a></li>
            </ul>
        </li>
        <li><a href="<?=DS.$params['lang'].DS.'aktuelno';?>"><?=$_t['navigation.actual.link'];?></a></li>
        <li><a href="#"><?=$_t['navigation.contests.link'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'dobitnici-nagradnih-igara';?>"><?=$_t['navigation.contests.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'foto-naticanje';?>"><?=$_t['navigation.photocontest.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'gde-smo';?>"><?=$_t['navigation.wherewearecontest.link'];?></a></li>
            </ul>
        </li>
        <li><a href="#"><?=$_t['navigation.press.link'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'press'.DS.'o-magazinu';?>"><?=$_t['navigation.aboutmagazine.link'];?></a></li>
            </ul>
        </li>
        <li><a href="#"><?=$_t['navigation.adv.link'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'oglasavanje'.DS.'opsti-uslovi-i-informacije';?>"><?=$_t['navigation.generalconditions.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'oglasavanje'.DS.'cenovnik-i-formati';?>"><?=$_t['navigation.prices.link'];?></a></li>
            </ul>
        </li>
        <li><a href="<?=DS.$params['lang'].DS.'download';?>"><?=$_t['navigation.download.link'];?></a></li>
        <li><a href="<?=DS.$params['lang'].DS.'kontakt';?>"><?=$_t['navigation.contact.link'];?></a></li>
    </ul>
    <ul class="lang">
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'sr' ? 'class="active"':'');?> href="<?=DS.'sr'.DS.implode('/', $params['breadcrumb']);?>">SR</a></li>
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'en' ? 'class="active"':'');?> href="<?=DS.'en'.DS.implode('/', $params['breadcrumb']);?>">EN</a></li>
    </ul>
</div>