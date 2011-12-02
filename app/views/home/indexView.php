<div class="wrapper">
    <div class="header">
        <h2>MAGAZIN</h2>
    </div>
    <div class="main">
        <? include_once VIEW_PATH.'home'.DS.'_mainNavigation.php'; ?>
        <div class="content">
            <div class="sideContent">
                <div class="sideBox">
                    <div class="context">
                        <input type="text" name="" value="pretraga" />
                    </div>
                </div>
                <div class="sideBox">
                    <div class="title">
                        ONLINE NAGRADNE IGRE
                    </div>
                    <div class="context custom">
                        asdasd
                    </div>
                </div>
                <div class="sideBox">
                    <div class="title">
                        NAGRADNE IGRE
                    </div>
                    <div class="context custom">
                        asdasd
                    </div>
                </div>
                <ul class="banners">
                    <li><img src="<?= IMAGE_PATH . 'banner.jpg'; ?>" /></li>
                    <li><img src="<?= IMAGE_PATH . 'banner.jpg'; ?>" /></li>
                    <li><img src="<?= IMAGE_PATH . 'banner.jpg'; ?>" /></li>
                </ul>
            </div>
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
        </div>
    </div>
</div>
<div class="footerW">
    <div class="footer">
        <div class="copy">
            Copyright © putovanjazadvoje.rs 2011.
        </div>
        <ul class="footerLinks">
            <li class="first"><a href="#">POCETNA STRANA</a>
                <ul>
                    <li><a href="#">Magazin</a></li>
                    <li><a href="#">Aktuelno</a></li>
                    <li><a href="#">Nagradne igre</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Oglasavanje</a></li>
                    <li><a href="#">Download</a></li>
                    <li><a href="#">Kontakt</a></li>
                </ul>
            </li>
            <li><a href="#">NOVO IZDANJE</a>
                <ul>
                    <li><a href="#">Magazin</a></li>
                    <li><a href="#">Aktuelno</a></li>
                    <li><a href="#">Nagradne igre</a></li>
                    <li><a href="#">Press</a></li>
                </ul>
            </li>
            <li class="last"><a href="#">KONTAKT</a>
                <ul>
                    <li>Email:</li>
                    <li>Tel:</li>
                    <li>Skype:</li>
                    <li>Facebook</li>
                    <li>Twitter</li>
                </ul>
            </li>
        </ul>
    </div>
</div>
