<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.searchresults.link'];?>
            </div>
            <div class="wys">
                <h1><?=$_t['page.searchresults.title'];?></h1>

                <!--Query -->
                <? if (!empty($params['q'])): ?>
                    <ul class="searchResults">
                        <li>
                            <h2><?=$_t['search.query.label'];?> <?= $params['q']; ?></h2>
                        </li>
                    </ul>
                <? endif; ?>

                <? if (!empty($resultCollection)): ?>
                    <!-- List of results START -->
                    <ul class="searchResults">
                        <!-- all news results -->
                        <? if(!empty($resultCollection['news'])):?>
                        <? foreach ($resultCollection['news'] as $r): ?>
                        <li>
                            <h2><a href="<?=DS.$params['lang'].DS.'aktuelno?newsId='.$r['news_id'];?>"><?=$r['title'];?></a></h2>
                            <p>
                                <?=$r['heading'];?>
                            </p>
                        </li>
                        <? endforeach; ?>
                        <? endif;?>
                        
                        <!-- all magazine results -->
                        <? if(!empty($resultCollection['magazine'])):?>
                        <? foreach ($resultCollection['magazine'] as $r): ?>
                        <li>
                            <h2><a href="<?=DS.$params['lang'].DS.'magazin'.DS.'broj-u-prodaji'.DS.'sadrzaj?id='.$r['magazine_id'];?>"><?=$r['number'];?></a></h2>
                            <p>
                                <?=$r['content'];?>
                            </p>
                        </li>
                        <? endforeach; ?>
                        <? endif;?>
                    </ul>
                    <!-- List of results END -->
                <? else: ?>

                    <p><?=$_t['search.noresults.label'];?></p>

                <? endif; ?>
            </div>
        </div>
    </div>
</div>
