<ul class="addTop">
    <li><a href="/cms/press/about-magazine" >Press</a></li>
    <li><h3>/ About Magazine:</h3></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms/press/about-magazine" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Press page">Description:</span></td>
                        <td>
                            <textarea name="aboutmagazine[sr][text]" class="jr"><?= @$aboutmagazine['sr']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Press page">Description:</span></td>
                        <td>
                            <textarea name="aboutmagazine[en][text]"><?= @$aboutmagazine['en']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <a href="#" id="jAddBrowse">Add browse</a>
            <table cellpadding="0" cellspacing="0" id="jListBrowse">
                <tbody>
                    <? if(!empty($fileCollection)):?>
                    <? foreach($fileCollection as $file):?>
                    <tr id="jLine-<?=$file['id'];?>">
                        <td><a href="<?=DS.'public'.DS.'uploads'.DS.'press'.DS.$file['file_name'];?>" target="_blank"><?=$file['image_name'];?></a></td>
                        <td><a browse-line="jLine-<?=$file['id'];?>" href="<?=DS.'cms'.DS.'press'.DS.'about-magazine'.DS.'delete-file'.DS.'?id='.$file['id'];?>" class="jRemoveBrowse">remove</a></td>
                    </tr>
                    <? endforeach;?>
                    <? endif;?>
                </tbody>
            </table>
            <table cellpadding="0" cellspacing="0" >
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" />
                            <input type="hidden" name="aboutmagazine[id]" value="<?= @$aboutmagazine['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>