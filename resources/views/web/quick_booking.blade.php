@extends("layouts.public")


@section("content")
 <!-- header begin -->
 @include("components.public.header")
    <!-- header close -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>
    
    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="assets2/images/background/subheader.jpg" class="jarallax-img" alt="">
        <div class="center-y relative text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Reservez rapidement votre location de véhicule</h1>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->

    <section id="section-hero" aria-label="section" class="no-top" data-bgcolor="#121212">
        <div class="container">
            <div class="row align-items-center"  id="AppRequest">
                <div class="col-lg-12 mt-80 sm-mt-0">
                    <div class="spacer-single sm-hide"></div>
                    <div id="booking_form_wrap" class="padding40 rounded-5 shadow-soft" data-bgcolor="#ffffff">
                        <form class="form-s2 row g-4 on-submit-hide" @submit.prevent="makeBookingRequest">
                            <div class="col-lg-6 d-light">
                                <h4>Sélection un véhicule</h4>
                                <select v-model="loan.car_id" name='vehicle_type' id="vehicle_type" class="form-control">
                                    @foreach ($cars as $car)
                                        <option value="{{ $car["id"] }}" data-src="{{ $car["medias"][0]["media_path"] }}">{{ $car["libelle"] }} - ${{ $car["loan"] }}</option>
                                    @endforeach
                                </select>

                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <h5>Lieu de location</h5>
                                        <input type="text" v-model="loan.area" class="form-control" readonly>
                                    </div>

                                    <div class="col-lg-6">
                                        <h5>Date & Heure de prise en charge</h5>
                                        <div class="date-time-field">
                                            <input type="text" v-model="loan.date" id="date-picker-2" name="return_date">
                                            <select name="return_time" v-model="loan.hour">
                                                <option value="00:00" selected>00:00</option>
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


                                    <div class="col-lg-12">
                                        <div class="field-set">
                                            <input type="text" v-model="costumer.nom" class="form-control" placeholder="Nom complet" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="field-set">
                                            <input type="text" v-model="costumer.phone"  class="form-control" placeholder="Téléphone" required>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <!-- customer details -->
                            <div class="col-lg-6">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="field-set">
                                            <input type="email" v-model="costumer.email" class="form-control" placeholder="Email(optionnel)">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="field-set">
                                            <input type="text" v-model="costumer.profession" class="form-control" placeholder="Profession" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="field-set">
                                            <textarea v-model="costumer.address" class="form-control" placeholder="Adresse"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="field-set">
                                            <textarea name="message" v-model="loan.recommandation" class="form-control" placeholder="Une requête particulière?"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <p id='submit'>
                                    <button :disabled="isLoading" type="submit" class="btn-main btn-fullwidth">  <span v-if="isLoading">En cours de traitement...</span> <span v-else>Soumettre</span></button>
                                </p>
                            </div>



                        </form>

            
                    </div>
                </div>
            </div>

            <div class="spacer-double"></div>

            <div class="row text-light">
                <div class="col-lg-12">
                    <div class="container-timeline">
                        <ul>
                            <li>
                                <h4>Choisir un véhicule</h4>
                                <p>Unlock unparalleled adventures and memorable journeys with our vast fleet of vehicles tailored to suit every need, taste, and destination.</p>
                            </li>
                            <li>
                                <h4>Votre Adresse et la date</h4>
                                <p>Pick your ideal location and date, and let us take you on a journey filled with convenience, flexibility, and unforgettable experiences.</p>
                            </li>
                            <li>
                                <h4>Make a booking</h4>
                                <p>Secure your reservation with ease, unlocking a world of possibilities and embarking on your next adventure with confidence.</p>
                            </li>
                            <li>
                                <h4>Sit back &amp; relax</h4>
                                <p>Hassle-free convenience as we take care of every detail, allowing you to unwind and embrace a journey filled comfort.</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section aria-label="section" class="pt40 pb40 text-light">
        <div class="wow fadeInRight d-flex">
            <div class="de-marquee-list s2">
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

            <div class="de-marquee-list s2">
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
@endsection

@section("scripts")
    <script src="assets/js/vuejs2.js"></script>
    <script src="assets/js/main/request.js"></script>
@endsection