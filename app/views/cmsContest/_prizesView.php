<div id="fragment-4" class="addContent2">
    <ul class="addTop">
        <li><a class="cmsAdd jPrizeAdd" href="<?=DS.'cms'.DS.'contest'.DS.'wizard'.DS.@$params['id'].DS.'prize-form';?>" >Add prize</a></li>
    </ul>
        <? if (!empty($contest['prizes'])): ?>
        <table cellpadding="0" cellspacing="0" border="0" class="display dataTable"> 
            <thead> 
                <tr> 
                    <th>Title</th> 
                    <th>Created</th> 
                    <th width="100px">Action</th> 
                </tr> 
            </thead> 
            <tbody> 
                <? foreach ($contest['prizes'] as $t): ?>
                    <tr> 
                        <td><?= $t['title']; ?></td>
                        <td><?= $html->convertDate($t['created'], true); ?></td> 
                        <td align="center">
                            <!--Edit-->
                            <a class="cmsEdit jPrizeAdd" title="Edit" href="/cms/contest/wizard/<?= @$t['contest_id'] . '/prize-form/?id=' . @$t['id']; ?>"></a>
                            <!--Delete-->
                            <a class="jw cmsDelete" title="Delete" href="/cms/contest/wizard/<?= @$t['contest_id']; ?>/prize-form/delete?id=<?= $t['id']; ?>" ></a>
                        </td> 
                    </tr> 
                <? endforeach; ?>
            <tfoot> 
                <tr> 
                    <th>Title</th> 
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

    <form name="wizard_prize" action="/cms/contest/wizard/<?=@$params['id'];?>/prize-form/submit" method="post" enctype="multipart/form-data">
        <div id="jPrizeForm"><!-- load prize form on request --></div>
        <input type="hidden" value="prizes" name="page" />
    </form>
</div>