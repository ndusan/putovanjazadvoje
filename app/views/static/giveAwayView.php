<?=$collection['text']; ?>

<? if(!empty($sent)):?>
Poslato
<? endif; ?>

<!-- Form -->
<form method="post" action="/<?=$params['lang'].DS.'pokloni-pretplatu';?>" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td>Name:</td>
                <td>
                    <input type="text" name="collection[name]" class="jr" value="<?= @$collection['name'];?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                </td>
            </tr>
        </tbody>
    </table>
</form>