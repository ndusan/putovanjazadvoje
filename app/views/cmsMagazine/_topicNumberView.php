<div id="fragment-4" class="addContent2">
    <div class="tabs">
        <ul>
            <li><a href="#fragment-4-1">Srpski</a></li>
            <li><a href="#fragment-4-2">English (optional)</a></li>
        </ul>
        <form name="wizard_topicnumber" action="/cms/magazine/wizard/<?=@$params['id'];?>" method="post" enctype="multipart/form-data">
        <div id="fragment-4-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Title:</span></td>
                        <td>
                            <input type="text" name="magazine[sr][title_totalnumber]" value="<?= @$magazine['sr']['title_topicnumber'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Topic content:</span></td>
                        <td>
                            <textarea name="magazine[sr][topicnumber]"><?= @$magazine['sr']['topicnumber'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-4-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Title:</span></td>
                        <td>
                            <input type="text" name="magazine[en][title_topicnumber]" value="<?= @$magazine['en']['title_topicnumber'];?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Topic content:</span></td>
                        <td>
                            <textarea name="magazine[en][topicnumber]"><?= @$magazine['en']['topicnumber'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            
            <? if (!empty($topicCollection)): ?>
                <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
                    <thead> 
                        <tr> 
                            <th>Image name</th> 
                            <th>Created</th> 
                            <th width="100px">Action</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <? foreach ($topicCollection as $t): ?>
                            <tr> 
                                <td><?= $t['image_name']; ?></td> 
                                <td><?= $html->convertDate($t['created'], true); ?></td> 
                                <td align="center">
                                    <!--Edit-->
                                    <a class="cmsEdit" title="Edit" href="/cms/magazine/wizard/topic-form/<?=@$t['magazine_id'].'?id='.$t['id']; ?>"></a>
                                    <!--Delete-->
                                    <a class="jw cmsDelete" title="Delete" href="/cms/magazine/wizard/topic-form/<?= $t['magazine_id']; ?>/delete?id="<?=@$t['id'];?> ></a>
                                </td> 
                            </tr> 
                        <? endforeach; ?>
                    <tfoot> 
                        <tr> 
                            <th>Image name</th> 
                            <th>Created</th> 
                            <th width="100px">Action</th> 
                        </tr> 
                    </tfoot> 
                </tbody> 
                </table> 
            <? else: ?>
                <div class="noResults">
                    There are no results on this page.
                </div>
            <? endif; ?>
            
            <div clear="both"><!--clear--></div>
            
            <a href="/cms/magazine/wizard/topic-form/<?=@$params['id'];?>" id="jcallSubform" class="cmsAdd">Add topic</a>
            
            <div clear="both"><!--clear--></div>
            
            <div id="jSubform"><!--load form--></div>
        </div>
        <input type="hidden" name="page" value="topicnumber"/>
        </form>
    </div>
</div>