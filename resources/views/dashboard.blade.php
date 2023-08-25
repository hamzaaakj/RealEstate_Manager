@extends('layouts.app')
@section('content')
            
                    <h1 class="mt-4"></h1>

                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">All Commercial</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white text-decoration-none stretched-link" href="{{ route('users.index') }}">{{ $userCount }}</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">All Residences</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white text-decoration-none stretched-link " href="{{ route('residences.index') }}">{{ $residenceCount }}</a>
                                        <div class="small text-white"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Apartments</span></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white text-decoration-none" href="{{ route('apartments.index') }}">All Apartments : {{ $apartmentCount }}</a>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white text-decoration-none"><span >Available : </span> {{ $availableApartmentsCount }}</a>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white text-decoration-none"><span >Reserved : </span> {{ $ReservedApartmentsCount}}</a>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white text-decoration-none"><span >Sold : </span> {{ $soldApartmentsCount }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                       
                            </div>
                        </div>
                    </div>
                </main>
                @endsection    
           
