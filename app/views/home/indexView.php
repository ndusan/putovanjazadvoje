<div class="mainContent">
    <div class="banner">
        <? if (!empty($carouselCollection)): ?>
            <div id="slides">
                <div class="slides_container">
                    <? foreach ($carouselCollection as $cc): ?>
                        <div class="slide">
                            <img src="<?= DS . 'public' . DS . 'uploads' . DS . 'carousel' . DS . $cc['image_name']; ?>" />
                            <div class="desc">
                                <p><?= $cc['content_' . $params['lang']]; ?></p>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
    </div>
    <div class="contentBox">
        <div class="context">
            <div class="bTitle blue">
                rec urednika
            </div>
            <div class="bTitle green">
                tema broja
            </div>
            <ul class="intro">
                <li>
                    <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    <div class="txt">
                        <p>
                            Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                        </p>
                    </div>
                </li>
                <li>
                    <img src="<?= IMAGE_PATH . 'dummy1.jpg'; ?>" />
                    <div class="txt">
                        <p>
                            Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                        </p>
                    </div>
                </li>
            </ul>
            <div class="breadcrumb">
                <a href="#">Pocetna</a> / Magazin / O nama
            </div>
            <div class="wys">
                <h1>O nama</h1>
                <p>
                    Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                </p>
            </div>
            <ul class="news">
                <li>
                    <div class="gTitle">
                        novo
                    </div>
                    <img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                    <h2>Plava laguna predstavlja
                        svoj novi identitet</h2>
                    <p>
                        Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                    </p>
                </li>
                <li>
                    <div class="gTitle">
                        novo
                    </div>
                    <img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                    <h2>Plava laguna predstavlja
                        svoj novi identitet</h2>
                    <p>
                        Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                    </p>
                </li>
                <li class="last">
                    <div class="gTitle">
                        novo
                    </div>
                    <img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                    <h2>Plava laguna predstavlja
                        svoj novi identitet</h2>
                    <p>
                        Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                    </p>
                </li>
            </ul>
            <ul class="actual">
                <li>
                    <img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                    <div class="txt">
                        <h2>Plava laguna predstavlja
                            svoj novi identitet</h2>
                        <p>
                            Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                        </p>
                    </div>
                </li>
                <li>
                    <img src="<?= IMAGE_PATH . 'dummy2.jpg'; ?>" />
                    <div class="txt">
                        <h2>Plava laguna predstavlja
                            svoj novi identitet</h2>
                        <p>
                            Kompanija Plava Laguna d.d. uvela je novi krovni brand - Laguna Poreč, koji se oslanja na prednosti dobro poznatog imena svoje destinacije.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>


