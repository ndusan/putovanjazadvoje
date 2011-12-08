<div class="mainContent">
    <div class="contentBox">
        <div class="context">
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h1>Rezultati pretrage</h1>

                <!--Query -->
                <? if (!empty($params['q'])): ?>
                    <ul class="searchResults">
                        <li>
                            <h2>Trazeni pojam: <?= $params['q']; ?></h2>
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

                    <p>Sorry, no results!</p>

                <? endif; ?>
            </div>
        </div>
    </div>
</div>
