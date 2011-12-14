<div class="navigation">
    <ul class="mainNav">
        <li><a class="home" href="<?=DS.$params['lang'];?>"></a></li>
        <li><a href="#"><?=$_t['main.magazine.link'];?></a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'o-nama';?>"><?=$_t['main.aboutus.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji';?>"><?=$_t['main.numberinsale.link'];?></a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pretplati-se-na-magazin';?>">Pretplati se na magazin</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'naruci-ranije-brojeve';?>">Naruči ranije brojeve</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'pokloni-pretplatu';?>">Pokloni pretplatu</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'arhiva-izdanja';?>">Arhiva izdanja</a></li>
            </ul>
        </li>
        <li><a href="<?=DS.$params['lang'].DS.'aktuelno';?>">aktuelno</a></li>
        <li><a href="#">nagradne igre</a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'dobitnici-nagradnih-igara';?>">Dobitnici nagradnih igara</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'foto-naticanje';?>">Foto naticanje</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'nagradne-igre'.DS.'gde-smo';?>">Gde smo?</a></li>
            </ul>
        </li>
        <li><a href="#">press</a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'press'.DS.'o-magazinu';?>">O magazinu</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'press'.DS.'download';?>">Download</a></li>
            </ul>
        </li>
        <li><a href="#">oglasavanje</a>
            <ul>
                <li><a href="<?=DS.$params['lang'].DS.'oglasavanje'.DS.'opsti-uslovi-i-informacije';?>">Opšti uslovi i informacije</a></li>
                <li><a href="<?=DS.$params['lang'].DS.'oglasavanje'.DS.'cenovnik-i-formati';?>">Cenovnik i formati</a></li>
            </ul>
        </li>
        <li><a href="<?=DS.$params['lang'].DS.'download';?>">download</a></li>
        <li><a href="<?=DS.$params['lang'].DS.'kontakt';?>">kontakt</a></li>
    </ul>
    <ul class="lang">
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'sr' ? 'class="active"':'');?> href="<?=DS.'sr'.DS.implode('/', $params['breadcrumb']);?>">SR</a></li>
        <li><a <?=(isset($params['lang']) && $params['lang'] == 'en' ? 'class="active"':'');?> href="<?=DS.'en'.DS.implode('/', $params['breadcrumb']);?>">EN</a></li>
    </ul>
</div>