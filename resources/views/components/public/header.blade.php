<header class="transparent scroll-light has-topbar">
    <div id="topbar" class="topbar-dark text-light">
        <div class="container">
            <div class="topbar-left xs-hide">
                <div class="topbar-widget">
                    <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+(243) 85 22 9296</a></div>
                    <div class="topbar-widget"><a href="#"><i class="fa fa-envelope"></i>contact@mutukaexpress.com</a></div>
                    <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>7j/7 24h/24</a></div>
                </div>
            </div>

            <div class="topbar-right">
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                    <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                    <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <div class="de-flex-col">
                            <!-- logo begin -->
                            <div id="logo">
                                <a href="index.html">
                                    <img class="logo-1" src="assets2/images/logo-light.png" alt="">
                                    <img class="logo-2" src="assets2/images/logo.png" alt="">
                                </a>
                            </div>
                            <!-- logo close -->
                        </div>
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <ul id="mainmenu">
                            <li>
                                <a class="menu-item" href="{{ url('/') }}">Accueil</a>
                            </li>
                            <li><a class="menu-item" href="#">Véhicules</a>
                                <ul>
                                    <li><a class="menu-item" href="#">Location véhicule</a></li>
                                    <li><a class="menu-item" href="#">Achat véhicule</a></li>
                                </ul>
                            </li>
                            <li><a class="menu-item" href="{{ url("/quick_booking") }}">Reservation rapide</a>
                            </li>
                            <li><a class="menu-item" href="#">Nouveauté</a>
                            </li>
                        </ul>
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="{{ url("/quick_booking") }}" class="btn-main">Reservez maintenant</a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>