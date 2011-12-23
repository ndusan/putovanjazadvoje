<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            
            <div class="wys">
                <h2>Cenovnik i formati</h2>
               
                <!-- text about magazine -->
                <?=$dataCollection['text'];?>
            
                <? if(!empty($dataCollection['files'])):?>
                <ul class="downloads">
                    <? foreach($dataCollection['files'] as $file):?>
                    <li><a href="<?=PUBLIC_UPLOAD_PATH.'ads'.DS.$file['file_name'];?>" target="_blank"><?=$file['file_name'];?> (Download <?=$file['type'];?>, <?=$file['size']/1024;?> kB)</a></li>
                    <? endforeach;?>
                </ul>
                <? endif;?>
            </div>
        </div>
    </div>
</div>