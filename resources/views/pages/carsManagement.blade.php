@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="AppCarManagement" data-specifications="{{json_encode($specifications) }}" data-features="{{json_encode($features)}}">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Gestion des véhicules</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Pages
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Gestion des véhicules</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->

        <!-- start-clients contant-->
        <div class="row">
            <div class="col-12">
                <div class="card card-statistics clients-contant">
                    <div class="card-header">
                        <div class="d-xxs-flex justify-content-between align-items-center">
                            <div class="card-heading">
                                <h4 class="card-title">Liste des véhicules</h4>
                            </div>
                            <div class="mt-xxs-0 mt-3">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddCar">Nouveau véhicule</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 table-responsive">
                        <table class="table clients-contant-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Libellé</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Prix de location</th>
                                    <th scope="col">Prix de vente</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicules as $v )
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-4">
                                                <img src="{{ count($v["medias"]) > 0 ? $v["medias"][0]["media_path"] : ''}}" style="height: 50px" class="img-fluid" alt="image">
                                            </div>
                                            <p class="font-weight-bold text-dark">{{$v["libelle"]}}</p>
                                        </div>
                                    </td>
                                    <td>{{$v['brand']['libelle']}}</td>
                                    <td>{{$v['loan']}} $</td>
                                    <td>{{$v['sell']}} $</td>
                                    <td><a href="javascript:void(0)" class="dot bg-primary"></a><span>{{ $v['status']}}</span></td>
                                    <td><a href="javascript:void(0)"
                                            class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0"><i
                                                class="ti ti-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-icon  mr-2 btn-outline-info btn-round"><i
                                                class="ti ti-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-icon btn-outline-danger btn-round"><i
                                                class="ti ti-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-clients contant-->


        <div class="modal fade" id="modalAddCar" >
            <div class="modal-dialog modal-lg" role="document">
                <form @submit.prevent="createCarFromBackend" class="modal-content" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Création véhicule</h5>
                        <button @click="cleanFields" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div v-if='error' class="alert alert-inverse-danger alert-dismissible fade show" role="alert">
                            <span> @{{error}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="ti ti-close"></i>
                            </button>
                        </div>
                        <div class="tab nav-border-bottom">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="infos-tab" data-toggle="tab" href="#infos" role="tab" aria-controls="infos" aria-selected="true">Véhicule infos</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="specifications-tab" data-toggle="tab" href="#specifications" role="tab" aria-controls="specifications" aria-selected="false">Spécifications </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="false">Fonctionnalités </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="medias-tab" data-toggle="tab" href="#medias" role="tab" aria-controls="medias" aria-selected="false">Medias </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="location-tab" data-toggle="tab" href="#locations" role="tab" aria-controls="locations" aria-selected="false">Location </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sell-tab" data-toggle="tab" href="#sell" role="tab" aria-controls="locations" aria-selected="false">Vente </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade py-3 active show" id="infos" role="tabpanel" aria-labelledby="infos-tab">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Marque *</label>
                                        <select class="form-control" v-model="vehicule.brand_id"  required>
                                            <option selected hidden label="Sélectionnez une marque..."></option>
                                            @foreach ($brands as $brand)
                                                <option value="{{$brand["id"]}}">{{$brand["libelle"]}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Modèle *</label>
                                        <input type="text" v-model="vehicule.libelle" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le libellé..." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description *</label>
                                        <textarea v-model="vehicule.description"  class="form-control" placeholder="Entrez une description..." required></textarea>
                                    </div>
                                </div>

                                <div class="tab-pane fade py-3" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                                    <div class="form-group row" v-for="(data, index) in specifications" :key="index">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">@{{data.libelle}}</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Saisir une valeur..." v-model="data.spec_value" id="inputEmail3">
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade py-3" id="features" role="tabpanel" aria-labelledby="features-tab">

                                    <div class="form-group" v-for="(data, index) in features" :key="index">
                                        <div class="checkbox checbox-switch switch-success">
                                            <label>
                                                <input type="checkbox" v-model="data.feat_value">
                                                <span></span>
                                                @{{data.libelle}}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade py-3" id="medias" role="tabpanel" aria-labelledby="medias-tab">
                                    <div class="form-group">
                                        <label for="customFile">Charger les images du véhicule</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" ref="inputFile" id="customFile" @change="handleFileChange">
                                            <label class="custom-file-label" for="customFile">Choisir une image</label>
                                        </div>
                                    </div>
                                    <div class="row magnific-wrapper">
                                        <div class="col-xl-3 col-md-4 col-sm-6" v-for="(media, index) in medias" :key="index">
                                            <div class="card card-statistics text-center">
                                                <div class="card-body p-0">
                                                    <div class="portfolio-item">
                                                        <img :src="media.media_path" alt="gallery-img" class="img-fluid">
                                                        <!-- Bouton de suppression de l'image -->
                                                        <button class="btn btn-icon btn-sm btn-outline-danger" @click="removeImage(index)" style="position: absolute; z-index: 999; top: 5px; right:5px;">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade py-3" id="locations" role="tabpanel" aria-labelledby="locations-tab">
                                    <div class="form-group">
                                        <label>Prix de location journalière</label>
                                        <div class="d-flex">
                                            <input type="text" v-model="vehicule.loan" class="form-control flex-fill w-100 mr-2" placeholder="0.00 $">
                                            <select class="form-control" style="width: 100px">
                                                <option value="USD" selected>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade py-3" id="sell" role="tabpanel" aria-labelledby="sell-tab">
                                    <div class="form-group">
                                        <label>Prix de vente</label>
                                        <div class="d-flex">
                                            <input type="text" v-model="vehicule.sell" class="form-control flex-fill w-100 mr-2" placeholder="0.00 $">
                                            <select class="form-control" style="width: 100px">
                                                <option value="USD" selected>USD</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="cleanFields" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" :disabled="isLoading" class="btn btn-success"> <span v-if="isLoading" class="spinner spinner-border spinner-border-sm"></span> Valider & soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section("scripts")
<script src="assets/js/main/cars.js"></script>
@endsection
