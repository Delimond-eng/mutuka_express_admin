@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Location des véhicules</h1>
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
                                <li class="breadcrumb-item active text-primary" aria-current="page">locations</li>
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
                                <h4 class="card-title">Liste des locations</h4>
                            </div>
                            <div class="mt-xxs-0 mt-3">
                                <a href="#" id="exportExcel" class="btn btn-primary">Exporter en Excel</a>
                                <div class="btn-group mb-2 mr-2 mb-xl-0 mr-xl-0 show">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        Filter par status
                                    </button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -144px, 0px);">
                                        <a class="dropdown-item text-primary" href="javascript:void(0)">En attente</a>
                                        <a class="dropdown-item text-success" href="javascript:void(0)">Terminé</a>
                                        <a class="dropdown-item text-danger" href="javascript:void(0)">Annuler</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 table-responsive">
                        <table class="table clients-contant-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Modèle</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Profession</th>
                                    <th scope="col">Date de prise en charge</th>
                                    <th scope="col">Lieu de prise en charge</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($requests as $v)
                            <tr>
                                <td>{{ $v["created_at"] }}</td>
                                <td>{{$v["vehicule"]['brand']['libelle']}}</td>
                                <td>{{$v["vehicule"]['libelle']}}</td>
                                <td>{{$v["vehicule"]['loan']}} $</td>
                                <td>{{$v["costumer"]['fullname']}}</td>
                                <td>{{$v["costumer"]['phone']}}</td>
                                <td>{{$v["costumer"]['email']}}</td>
                                <td>{{$v["costumer"]['profession']}}</td>
                                <td>{{$v["pick_up_date"]}}</td>
                                <td>{{$v["pick_up_area"]}}</td>
                                <td><a href="javascript:void(0)" class="dot bg-primary"></a><span>{{ $v['status']}}</span></td>
                                <td>
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
    </div>
@endsection