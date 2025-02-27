@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="AppConfig">
        <!-- begin row -->
        <div class="row">
            <div class="col-md-12 m-b-30">
                <!-- begin page title -->
                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                    <div class="page-title mb-2 mb-sm-0">
                        <h1>Configuration</h1>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <nav>
                            <ol class="breadcrumb p-0 m-b-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    Configuration
                                </li>
                                <li class="breadcrumb-item active text-primary" aria-current="page">Spécifications</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-md-6">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Liste des spécifications</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($specifications as $sp)
                            <li class="list-group-item text-dark d-flex justify-content-between align-items-center">
                                {{ $sp["libelle"] }}
                                <a href="/config.delete?table=specifications&id={{ $sp['id'] }}" 
                                    class="btn btn-icon btn-sm btn-inverse-danger" 
                                    onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-statistics">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4 class="card-title">Formulaire de création</h4>
                        </div>
                    </div>

                    <div class="card-body">
                    
                        <form method="post" action="/config.specifications">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Libelle</label>
                                <input type="text" name="libelle" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection