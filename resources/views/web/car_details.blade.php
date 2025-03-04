@extends("layouts.public")

@section("content")
    <!-- header begin -->
    @include("components.public.header")
    <!-- header close -->
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="assets2/images/background/2.jpg" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>{{ $car["libelle"] }}</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-car-details">
            <div class="container" id="AppRequest">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div id="slider-carousel" class="owl-carousel">

                            @foreach ($car["medias"] as $media)
                                <div class="item">
                                    <img src="{{ $media["media_path"] }}" alt="pic">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h3>{{ $car["libelle"] }}</h3>
                        <p>{{ $car["description"] }}</p>

                        <div class="spacer-10"></div>

                        <h4>Specifications</h4>
                        <div class="de-spec">

                            @foreach ($car["specifications"] as $spec )
                            <div class="d-row">
                                <span class="d-title">{{ $spec["specification"]["libelle"] }}</span>
                                <spam class="d-value">{{ $spec["spec_value"] }}</spam>
                            </div>
                            @endforeach
                        </div>

                        <div class="spacer-single"></div>

                        <h4>Features</h4>
                        <ul class="ul-style-2">
                            @foreach ($car["features"] as $feat )
                                <li>{{ $feat["feature"]["libelle"] }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <div class="de-price text-center">
                            Tarif journalier
                            <h3>${{ $car["loan"] }}</h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form name="contactForm" @submit.prevent="makeBookingRequest" method="post">
                                <h4>Reservation du véhicule</h4>

                                <div class="spacer-20"></div>

                                <div class="row">
                                    <input type="text" id="carId" value="{{ $car["id"] }}" hidden>
                                    <div class="col-lg-12 mb20">
                                        <h5>Email</h5>
                                        <input v-model="costumer.email" type="email" 
                                            placeholder="ex: exemple@domain"
                                            autocomplete="off" class="form-control" required>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Profession (optionnelle)</h5>
                                        <input type="text" v-model="costumer.profession" 
                                            placeholder="ex: Comptable"
                                            autocomplete="off" class="form-control">
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Votre Nom complet</h5>
                                        <input type="text" v-model="costumer.nom"
                                            placeholder="ex: Gaston Delimond..."
                                            autocomplete="off" class="form-control">
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Téléphone</h5>
                                        <input type="tel" v-model="costumer.phone"
                                            placeholder="ex: +(243)xxx"
                                            autocomplete="off" class="form-control">
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Date et heure de prise en charge</h5>
                                        <div class="date-time-field">
                                            <input type="text" id="date-picker-2">
                                            <select name="Pick Up Time" v-model="loan.hour" id="pickup-time">
                                                <option selected disabled value="Select time">Time</option>
                                                <option value="00:00">00:00</option>
                                                <option value="00:30">00:30</option>
                                                <option value="01:00">01:00</option>
                                                <option value="01:30">01:30</option>
                                                <option value="02:00">02:00</option>
                                                <option value="02:30">02:30</option>
                                                <option value="03:00">03:00</option>
                                                <option value="03:30">03:30</option>
                                                <option value="04:00">04:00</option>
                                                <option value="04:30">04:30</option>
                                                <option value="05:00">05:00</option>
                                                <option value="05:30">05:30</option>
                                                <option value="06:00">06:00</option>
                                                <option value="06:30">06:30</option>
                                                <option value="07:00">07:00</option>
                                                <option value="07:30">07:30</option>
                                                <option value="08:00">08:00</option>
                                                <option value="08:30">08:30</option>
                                                <option value="09:00">09:00</option>
                                                <option value="09:30">09:30</option>
                                                <option value="10:00">10:00</option>
                                                <option value="10:30">10:30</option>
                                                <option value="11:00">11:00</option>
                                                <option value="11:30">11:30</option>
                                                <option value="12:00">12:00</option>
                                                <option value="12:30">12:30</option>
                                                <option value="13:00">13:00</option>
                                                <option value="13:30">13:30</option>
                                                <option value="14:00">14:00</option>
                                                <option value="14:30">14:30</option>
                                                <option value="15:00">15:00</option>
                                                <option value="15:30">15:30</option>
                                                <option value="16:00">16:00</option>
                                                <option value="16:30">16:30</option>
                                                <option value="17:00">17:00</option>
                                                <option value="17:30">17:30</option>
                                                <option value="18:00">18:00</option>
                                                <option value="18:30">18:30</option>
                                                <option value="19:00">19:00</option>
                                                <option value="19:30">19:30</option>
                                                <option value="20:00">20:00</option>
                                                <option value="20:30">20:30</option>
                                                <option value="21:00">21:00</option>
                                                <option value="21:30">21:30</option>
                                                <option value="22:00">22:00</option>
                                                <option value="22:30">22:30</option>
                                                <option value="23:00">23:00</option>
                                                <option value="23:30">23:30</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Adresse</h5>
                                        <textarea v-model="costumer.address" class="form-control" placeholder="ex :n°..., av.., Q....."></textarea>
                                    </div>

                                    <div class="col-lg-12 mb20">
                                        <h5>Une recommandation Particulière</h5>
                                        <div class="date-time-field">
                                           <textarea v-model="loan.recommandation" class="form-control" placeholder="Entrez une recommandation..."></textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn-main btn-fullwidth">Soumettre la reservation</button>
                                <div class="clearfix"></div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section("scripts")
<script src="assets/js/vuejs2.js"></script>
<script src="assets/js/main/request.js"></script>
@endsection