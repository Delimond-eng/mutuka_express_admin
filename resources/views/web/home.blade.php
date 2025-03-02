@extends("layouts.public")

@section("content")
    <!-- header begin -->
    @include("components.public.header")
    <!-- header close -->
    <!-- content begin -->
    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <!-- <section id="section-hero" aria-label="section" class="jarallax text-light full-height vertical-center">
            <img src="assets2/images/background/6.jpg" class="jarallax-img" alt="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="spacer-double"></div>
                        <div class="spacer-10"></div>
                        <h1>Explore the world with comfortable car</h1>
                        <p class="lead">Embark on unforgettable adventures and discover the world in unparalleled comfort and style with our fleet of exceptionally comfortable cars.</p>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="box-icon s2 p-small mb20">
                                    <i class="fa bg-color fa-trophy"></i>
                                    <div class="d-inner">
                                        <h4 class="id-color">First class services</h4>
                                        Est dolore ut laboris eu enim eu veniam nostrud esse laborum duis
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="box-icon s2 p-small mb20">
                                    <i class="fa bg-color fa-road"></i>
                                    <div class="d-inner">
                                        <h4 class="id-color">24/7 road assistance</h4>
                                        Est dolore ut laboris eu enim eu veniam nostrud esse laborum duis
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a class="btn-main btn-main me-2" href="#">Louez un véhicule</a>
                        <a class="btn-main btn-main" href="#">Achetez un véhicule</a>


                    </div>

                </div>
            </div>
        </section> -->

        <section id="de-carousel" class="no-top no-bottom carousel slide carousel-fade dark-scheme"
                data-mdb-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators z1000">
                <li data-mdb-target="#de-carousel" data-mdb-slide-to="0" class="active"></li>
                <li data-mdb-target="#de-carousel" data-mdb-slide-to="1"></li>
                <li data-mdb-target="#de-carousel" data-mdb-slide-to="2"></li>
            </ol>

            <!-- Inner -->
            <div class="carousel-inner position-relative">
                <!-- Single item -->
                <div class="carousel-item active jarallax">
                    <img src="assets2/images/slider/1.jpg" class="jarallax-img" alt="">
                    <div class="mask">
                        <div class="no-top no-bottom">
                            <div class="h-100 v-center">
                                <div class="container">
                                    <div class="row gx-5 align-items-center">
                                        <div class="col-lg-6 offset-lg-3 text-center mb-sm-30">
                                            <h1 class="s3 mb-3 wow fadeInUp">Voitures de luxe</h1>
                                            <p class="lead wow fadeInUp" data-wow-delay=".3s">Découvrez le monde
                                                dans un confort et un style incomparables..</p>
                                            <div class="spacer-10"></div>
                                            <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                                                href="#">Reservez maintenant</a>
                                            <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                                                href="#">Achetez un véhicule</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item jarallax">
                    <img src="assets2/images/slider/2.jpg" class="jarallax-img" alt="">
                    <div class="mask">
                        <div class="no-top no-bottom">
                            <div class="h-100 v-center">
                                <div class="container">
                                    <div class="row gx-5 align-items-center">
                                        <div class="col-lg-6 offset-lg-3 text-center mb-sm-30">
                                            <h1 class="s3 mb-3 wow fadeInUp">Première classe</h1>
                                            <p class="lead wow fadeInUp" data-wow-delay=".3s">Créer des moments
                                                inoubliables et dépasser toutes vos attentes.</p>
                                            <div class="spacer-10"></div>
                                            <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                                                href="#">Reservez maintenant</a>
                                            <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                                                href="#">Achetez un véhicule</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item jarallax">
                    <img src="assets2/images/slider/3.jpg" class="jarallax-img" alt="">
                    <div class="mask">
                        <div class="no-top no-bottom">
                            <div class="h-100 v-center">
                                <div class="container">
                                    <div class="row gx-5 align-items-center">
                                        <div class="col-lg-6 offset-lg-3 text-center mb-sm-30">
                                            <h1 class="s3 mb-3 wow fadeInUp">Meilleurs conducteurs</h1>
                                            <p class="lead wow fadeInUp" data-wow-delay=".3s">Nos chauffeurs
                                                expérimentés sont prêts à accompagner votre voyage.</p>
                                            <div class="spacer-10"></div>
                                            <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                                                href="#">Reservez maintenant</a>
                                            <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                                                href="#">Achetez un véhicule</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Inner -->

            <!-- Controls -->
            <a class="carousel-control-prev" href="#de-carousel" role="button" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#de-carousel" role="button" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <div class="de-gradient-edge-bottom"></div>
        </section>

        <section aria-label="section" class="pt40 pb40 text-light" data-bgcolor="#111111">
            <div class="wow fadeInRight d-flex">
                <div class="de-marquee-list">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Berline à hayon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Berline</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Voiture de sport</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Camion</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Voitures exotiques</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                    </div>
                </div>

                <div class="de-marquee-list">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Berline à hayon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Berline</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Voiture de sport</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Camion</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Voitures exotiques</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- loan car -->
        

        <section id="section-cars">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 offset-lg-3 text-center">
                        <span class="subtitle">Veuillez faire votre choix</h2></span>
                        <h2>Notre flotte de véhicules.</h2>
                        <p>Nos chauffeurs les plus expérimentés veillent à votre sécurité routière et garantissent
                            un service de qualité.</p>
                        <div class="spacer-20"></div>
                    </div>

                    <div class="clearfix"></div>
                    @foreach ($cars as $v)
                        <div class="col-lg-3">
                            <div class="de-item mb30">
                                <div class="d-img">
                                    <img src="{{ count($v["medias"]) > 0 ? $v["medias"][0]["media_path"] : 'assets/images/cars/bentley.jpg'}}" class="img-fluid" alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>{{ $v["libelle"] }}</h4>
                                        <div class="d-item_like" hidden>
                                            <i class="fa fa-heart"></i><span>21</span>
                                        </div>
                                        <div class="d-atr-group">
                                            <!-- <span class="d-atr"><img src="assets2/images/icons/1-green.svg" alt="">5</span>
                                            <span class="d-atr"><img src="assets2/images/icons/2-green.svg" alt="">2</span>
                                            <span class="d-atr"><img src="assets2/images/icons/3-green.svg" alt="">4</span> -->
                                            <span class="d-atr"><img src="assets2/images/icons/4-green.svg" alt="">{{ $v["brand"]["libelle"] }}</span>
                                        </div>
                                        <div class="d-price">
                                            Tarif journalier <span>${{ $v["loan"] }}</span>
                                            <a class="btn-main" href="{{ url('/car_details') }}?car_id={{ $v['id'] }}">Louer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 text-center">
                    <a class="btn-line mb10 wow fadeInUp" data-wow-delay=".6s"
                    href="{{ url("/more_cars") }}">Achetez un véhicule</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- end -->

        <section class="text-light jarallax" aria-label="section">
            <img src="assets2/images/background/3.jpg" alt="" class="jarallax-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h1>Let's Your Adventure Begin</h1>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-trophy de-icon mb20"></i>
                        <h4>First Class Services</h4>
                        <p>Where luxury meets exceptional care, creating unforgettable moments and exceeding your
                            every expectation.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-road de-icon mb20"></i>
                        <h4>24/7 road assistance</h4>
                        <p>Reliable support when you need it most, keeping you on the move with confidence and peace
                            of mind.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-map-pin de-icon mb20"></i>
                        <h4>Free Pick-Up & Drop-Off</h4>
                        <p>Enjoy free pickup and drop-off services, adding an extra layer of ease to your car rental
                            experience.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="section-call-to-action" class="bg-color text-light">
            <div class="container">
                <div class="row g-custom-x force-text-center">
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count wow fadeInUp">
                            <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                            Completed Orders
                            <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count wow fadeInUp">
                            <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                            Happy Customers
                            <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count wow fadeInUp">
                            <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                            Vehicles Fleet
                            <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-sm-30">
                        <div class="de_count wow fadeInUp">
                            <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                            Years Experience
                            <p class="d-small">Lorem ipsum adipisicing officia in adipisicing do velit sit tempor ea consectetur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section" class="pt40 pb40 text-light" data-bgcolor="#181818">
            <div class="wow fadeInRight d-flex">
                <div class="de-marquee-list">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Hatchback</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sedan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sports Car</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Truck</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Exotic Cars</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                    </div>
                </div>

                <div class="de-marquee-list">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Hatchback</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sedan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sports Car</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Truck</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Exotic Cars</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- content close -->
@endsection