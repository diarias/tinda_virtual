@extends('vendor.layouts.master')
@section('title')
    {{ $settings->site_name }} || Dashboard
@endsection
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.side-bar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content">
                        <div class="wsus__dashboard">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Información del día</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-auto">
                                        <div class="col-xl-6 col-6 col-md-4">
                                            <a class="wsus__dashboard_item blue" href="{{ route('vendor.orders.index') }}">
                                                <i class="fas fa-cart-plus"></i>
                                                <p>Órdenes</p>
                                                <h4 style="color:#ffff">{{ $todaysOrder }}</h4>
                                            </a>
                                        </div>
                                        <div class="col-xl-6 col-6 col-md-4">
                                            <a class="wsus__dashboard_item red" href="{{ route('vendor.orders.index') }}">
                                                <i class="fas fa-bookmark"></i>
                                                <p>Órdenes Pendientes</p>
                                                <h4 style="color:#ffff">{{ $todaysPendingOrder }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Información Financiera</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-auto">
                                        <div class="col-xl-4 col-6 col-md-4">
                                            <a class="wsus__dashboard_item blue" href="javascript:;">
                                                <i class="fas fa-calendar-day"></i>
                                                <p>Ganacias del día</p>
                                                <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $todaysEarnings }}
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-6 col-md-4">
                                            <a class="wsus__dashboard_item green" href="javascript:;">
                                                <i class="fas fa-calendar-alt"></i>
                                                <p>Ganancias del mes</p>
                                                <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $monthEarnings }}
                                                </h4>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-6 col-md-4">
                                            <a class="wsus__dashboard_item orange" href="javascript:;">
                                                <i class="fas fa-calendar"></i>
                                                <p>Ganancias del año</p>
                                                <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $yearEarnings }}
                                                </h4>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Información de perfil</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-auto">
                                        <div class="col-xl-6 col-6 col-md-4">
                                            <a class="wsus__dashboard_item sky"
                                                href="{{ route('vendor.reviews.index') }}">
                                                <i class="fas fa-certificate"></i>
                                                <p>Total de Reseñas</p>
                                                <h4 style="color:#ffff">{{ $totalReviews }}</h4>
                                            </a>
                                        </div>
                                        <div class="col-xl-6 col-6 col-md-4">
                                            <a class="wsus__dashboard_item purple"
                                                href="{{ route('vendor.shop-profile.index') }}">
                                                <i class="fas fa-user-shield"></i>
                                                <p>Perfil de la tienda</p>
                                                <h4 style="color:#ffff">-</h4>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Información histórica</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row mx-auto">
                                        <div class="col-xl-4 col-6 col-md-4">
                                            <a class="wsus__dashboard_item blue"
                                                href="{{ route('vendor.orders.index') }}">
                                                <i class="fas fa-archive"></i>
                                                <p>Total Órdenes</p>
                                                <h4 style="color:#ffff">{{ $totalOrder }}</h4>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-6 col-md-4">
                                            <a class="wsus__dashboard_item green"
                                                href="{{ route('vendor.orders.index') }}">
                                                <i class="fas fa-clipboard-list"></i>
                                                <p>Ordenes Pendientes</p>
                                                <h4 style="color:#ffff">{{ $totalPendingOrder }}</h4>
                                            </a>
                                        </div>
                                        <div class="col-xl-4 col-6 col-md-4">
                                            <a class="wsus__dashboard_item orange" href="{{ route('vendor.orders.index') }}">
                                                <i class="fas fa-cart-arrow-down"></i>
                                                <p>Órdenes Completadas</p>
                                                <h4 style="color:#ffff">{{ $totalCompleteOrder }}</h4>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row mx-auto">
                                      <div class="col-xl-6 col-6 col-md-4">
                                        <a class="wsus__dashboard_item red"
                                            href="{{ route('vendor.products.index') }}">
                                            <i class="fas fa-cubes"></i>
                                            <p>Productos Registrados</p>
                                            <h4 style="color:#ffff">{{ $totalProducts }}</h4>
                                        </a>
                                    </div>
                                    <div class="col-xl-6 col-6 col-md-4">
                                        <a class="wsus__dashboard_item purple" href="javascript:;">
                                            <i class="fas fa-chart-line"></i>
                                            <p>Ganancias Generales</p>
                                            <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $toalEarnings }}
                                            </h4>
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
