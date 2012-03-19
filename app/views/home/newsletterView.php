<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?= $_t['breadcrumb.home.link']; ?></a> / <?= $_t['breadcrumb.newsletter.link']; ?>
            </div>

            <? if (!empty($sent)): ?>
                <div class="success">
                    <?= $_t['newsletterform.sent.label']; ?>
                </div>
            <? endif; ?>
            <div class="wys">
                <p>tekst ovde</p>         
            </div>
            <h2><?= $_t['page.newsletterform.title']; ?></h2>

            <div class="forms">
                <form action="<?= DS . $params['lang'] . DS . 'newsletter'; ?>" method="post">
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td>
                                    Email:<span>*</span>
                                </td>
                                <td>
                                    <input type="text" name="email" class="jr jCheckEmail jInput" value="Please, enter your email" title="Please, enter your email"/>
                                    <span class="req"><?= $_t['newsletterform.required.label']; ?></span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" align="center">
                                    <input type="submit" name="submit" value="Submit"/>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>