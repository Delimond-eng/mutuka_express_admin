@extends("layouts.public")

@section("content")
    @include("components.public.header")

     <!-- content begin -->
     <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="assets2/images/background/2.jpg" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Notre flotte des véhicules</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="item_filter_group">
                            <h4>Filtrez par Marque</h4>
                            <div class="de_form">
                                <div class="de_checkbox">
                                    <input id="vehicle_type_1" name="vehicle_type_1" type="checkbox"
                                        value="vehicle_type_1">
                                    <label for="vehicle_type_1">Car</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="vehicle_type_2" name="vehicle_type_2" type="checkbox"
                                        value="vehicle_type_2">
                                    <label for="vehicle_type_2">Van</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="vehicle_type_3" name="vehicle_type_3" type="checkbox"
                                        value="vehicle_type_3">
                                    <label for="vehicle_type_3">Minibus</label>
                                </div>

                                <div class="de_checkbox">
                                    <input id="vehicle_type_4" name="vehicle_type_4" type="checkbox"
                                        value="vehicle_type_4">
                                    <label for="vehicle_type_4">Prestige</label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">

                        @foreach ($cars as $v)
                        <div class="col-lg-4">
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
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- content close -->
@endsection