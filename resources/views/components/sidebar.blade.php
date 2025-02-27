<!-- begin app-nabar -->
<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">MAIN</li>
            <li class="{{ Str::contains(request()->path(), 'admin') ? 'active' : '' }}">
                <a href="{{ url("/admin") }}">
                    <i class="nav-icon ti ti-rocket"></i>
                    <span class="nav-title">Tableau de bord</span>
                    <span class="nav-label label label-danger">9</span>
                </a>
            </li>
            <li class="{{ Str::contains(request()->path(), 'cars.management') ? 'active' : '' }}"><a href="/cars.management" aria-expanded="false"><i
                        class="nav-icon ti ti-car"></i><span class="nav-title">Gestion des véhicules</span></a> </li>

            <li class="{{ Str::contains(request()->path(), 'loan') ? 'active' : '' }}"><a href="{{ url("/loans") }}" aria-expanded="false"><i
                        class="nav-icon ti ti-shopping-cart-full"></i><span class="nav-title">Locations</span></a> </li>

            <li class="{{ Str::contains(request()->path(), 'buy') ? 'active' : '' }}"><a href="{{ url("/buy.requests") }}" aria-expanded="false"><i
                        class="nav-icon ti ti-shopping-cart"></i><span class="nav-title">Requêtes d'achat</span></a> </li>
            <li class="{{ Str::contains(request()->path(), 'config.') ? 'active' : '' }}">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                        class="nav-icon ion ion-ios-build-outline"></i> <span class="nav-title">Configurations</span></a>
                <ul aria-expanded="false">
                    <li> <a href="{{ url("/config.specifications") }}">Spécifications</a> </li>
                    <li> <a href="{{ url("/config.features") }}">Fonctionnalités</a> </li>
                    <li> <a href="{{ url("/config.brands") }}">Marques</a> </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>
<!-- end app-navbar -->
