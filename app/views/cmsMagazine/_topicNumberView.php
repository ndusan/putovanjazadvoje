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
                            <input type="text" name="magazine[sr][topic_title]" value="<?= @$magazine['topic_title']['sr'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Topic content:</span></td>
                        <td>
                            <textarea name="magazine[sr][topic_content]"><?= @$magazine['topic_content']['sr'];?></textarea>
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
                            <input type="text" name="magazine[en][topic_title]" value="<?= @$magazine['topic_titile']['en'];?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Content tha will be visible on site">Topic content:</span></td>
                        <td>
                            <textarea name="magazine[en][topic_content]"><?= @$magazine['topic_content']['en'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <input type="hidden" name="page" value="topicnumber"/>
        </form>
        
        <div class="addContent">
            
            <? if (!empty($magazine['subtopic'])): ?>
                <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
                    <thead> 
                        <tr> 
                            <th>Image name</th> 
                            <th>Created</th> 
                            <th width="100px">Action</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <? foreach ($magazine['subtopic'] as $t): ?>
                            <tr> 
                                <td><?= $t['title']; ?></td>
                                <td><?= $html->convertDate($t['created'], true); ?></td> 
                                <td align="center">
                                    <!--Edit-->
                                    <a class="cmsEdit jcallSubform" title="Edit" href="/cms/magazine/wizard/<?=@$t['magazine_id'].'/topic-form/?id='.@$t['id']; ?>"></a>
                                    <!--Delete-->
                                    <a class="jw cmsDelete" title="Delete" href="/cms/magazine/wizard/<?= @$t['magazine_id']; ?>/topic-form/delete?id=<?=$t['id'];?>" ></a>
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
            
            <a href="/cms/magazine/wizard/<?=@$params['id'];?>/topic-form" class="cmsAdd jcallSubform">Add topic</a>
            
            <div clear="both"><!--clear--></div>
            
            <div id="jSubform"><!--load form--></div>
        </div>
        
    </div>
</div>