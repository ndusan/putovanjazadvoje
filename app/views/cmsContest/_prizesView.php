<div id="fragment-4" class="addContent2">
    <ul class="addTop">
        <li><a class="cmsAdd" id="jPrizeAdd" href="<?=DS.'cms'.DS.'contest'.DS.'wizard'.DS.'prize-form';?>" >Add prize</a></li>
    </ul>

    <form name="wizard_content" action="/cms/contest/wizard" method="post" enctype="multipart/form-data">
    
        <div id="jPrizeForm"><!-- load prize form on request --></div>
        
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Create contest" name="Submit"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <input type="hidden" value="prizes" name="page" />
    </form>
</div>