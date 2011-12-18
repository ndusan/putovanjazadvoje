<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#"><?=$_t['breadcrumb.home.link'];?></a> / <?=$_t['breadcrumb.searchresults.link'];?>
            </div>
            <div class="wys">
                <h1><?=$_t['search.title.label'];?></h1>

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
                        <li>

                        </li>
                        <? foreach ($resultCollection as $r): ?>
                            <li>
                                <h2><a href="#">Plava laguna predstavlja svoj novi identitet</a></h2>
                                <p>
                                    Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                                </p>
                            </li>
                        <? endforeach; ?>
                    </ul>
                    <!-- List of results END -->

                <? else: ?>

                    <p><?=$_t['search.noresults.label'];?></p>

                <? endif; ?>
            </div>
        </div>
    </div>
</div>
