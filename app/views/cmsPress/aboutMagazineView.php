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
                            <textarea name="aboutmagazine[sr][text]" class="jr"><?= @$aboutmagazine['sr']['text']; ?></textarea>
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
                            <textarea name="aboutmagazine[en][text]"><?= @$aboutmagazine['en']['text']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0" width="710" id="jListBrowse">
                <thead>
                    <tr>
                        <th colspan="3">
                            Attach files (Pdf, Doc)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <? if (!empty($fileCollection)): ?>
                        <? foreach ($fileCollection as $file): ?>
                            <tr id="jLine-<?= $file['id']; ?>">
                                <td><?= $file['alias_name']; ?></td>
                                <td><a href="<?= DS . 'public' . DS . 'uploads' . DS . 'press' . DS . $file['file_name']; ?>" target="_blank"><?= $file['file_name']; ?></a></td>
                                <td><a browse-line="jLine-<?= $file['id']; ?>" href="<?= DS . 'cms' . DS . 'press' . DS . 'about-magazine' . DS . 'delete-file' . DS . '?id=' . $file['id']; ?>" title="Remove file"class="jRemoveBrowse cmsDelete"></a></td>
                            </tr>
                        <? endforeach; ?>
                    <? endif; ?>
                </tbody>
            </table>
            <ul class="addTop">
                <li>
                    <a id="jAddBrowse" href="#" class="cmsAdd">Add file</a>
                </li>
            </ul>
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