@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Requêtes d'achat des véhicules</h1>
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
                                <li class="breadcrumb-item active text-primary" aria-current="page">Requêtes d'achat</li>
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
                                <h4 class="card-title">Liste des Requêtes d'achat</h4>
                            </div>
                            <div class="mt-xxs-0 mt-3">
                                <a href="#" id="exportExcel" class="btn btn-primary">Exporter en Excel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-0 table-responsive">
                        <table class="table clients-contant-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Marque de véhicule</th>
                                    <th scope="col">Modèle</th>
                                    <th scope="col">Client Nom</th>
                                    <th scope="col">Client Téléphone</th>
                                    <th scope="col">Client Profession</th>
                                    <th scope="col">Client Adresse</th>
                                    <th scope="col">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                          
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end-clients contant-->
    </div>
@endsection