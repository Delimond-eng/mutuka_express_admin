<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">MAIN</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="/">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Tableau de bord</span>
                    <span class="nav-label label label-danger">9</span>
                </a>
            </li>
            <li class="{{ request()->is('cars.management') ? 'active' : '' }}"><a href="/cars.management" aria-expanded="false"><i
                        class="nav-icon ti ti-car"></i><span class="nav-title">Gestion des véhicules</span></a> </li>

            <li><a href="#" aria-expanded="false"><i
                        class="nav-icon ti ti-shopping-cart-full"></i><span class="nav-title">Locations</span></a> </li>

            <li><a href="mail-inbox.html" aria-expanded="false"><i
                        class="nav-icon ti ti-shopping-cart"></i><span class="nav-title">Requêtes d'achat</span></a> </li>
            <li>
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                        class="nav-icon ion ion-ios-build-outline"></i> <span class="nav-title">Configurations</span></a>
                <ul aria-expanded="false">
                    <li> <a href="#">Spécifications</a> </li>
                    <li> <a href="#">Fonctionnalités</a> </li>
                    <li> <a href="#">Marques</a> </li>
                    <li> <a href="#">Location Prix</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>
<!-- end app-navbar -->
