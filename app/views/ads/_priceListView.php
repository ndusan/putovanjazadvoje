<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="<?=DS.$params['lang'];?>"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['footer.adv.link'];?> / <?=$_t['breadcrumb.price.link'];?>
            </div>
            
            <div class="wys">

                <h2><?=$_t['page.price.title'];?></h2>
               
                <!-- text about magazine -->
                <?=$dataCollection['text'];?>
            
                <? if(!empty($dataCollection['files'])):?>

                <ul class="downloads">
                    <? foreach($dataCollection['files'] as $file):?>
                    <li><a href="<?=PUBLIC_UPLOAD_PATH.'ads'.DS.$file['file_name'];?>" target="_blank"><?=$file['alias_name'];?> (Download <?=$file['type'];?>, <?=round($file['size']/1024, 2);?> kB)</a></li>
                    <? endforeach;?>
                </ul>
                <? endif;?>
            </div>
        </div>
    </div>
</div>