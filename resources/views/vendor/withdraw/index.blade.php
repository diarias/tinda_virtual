@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Retirar
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.side-bar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content mt-2 mt-md-0">

            <h3><i class="far fa-user"></i>Todos los Retiros</h3>
            <div class="wsus__dashboard">
                <div class="row">
                    <div class="col-md-4">
                        <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                          <i class="fas fa-cart-plus"></i>
                          <p>Saldo actual</p>
                          <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $currentBalance }}</h4>

                        </a>
                      </div>

                      <div class="col-md-4">
                        <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                          <i class="fas fa-cart-plus"></i>
                          <p>Monto pendiente</p>
                          <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $pendingAmount }}</h4>
                        </a>
                      </div>

                      <div class="col-md-4">
                        <a class="wsus__dashboard_item red" href="{{route('vendor.orders.index')}}">
                          <i class="fas fa-cart-plus"></i>
                          <p>Retiro Total</p>
                          <h4 style="color:#ffff">{{ $settings->currency_icon }}{{ $totalWithdraw }}</h4>
                        </a>
                      </div>
                </div>
            </div>
            <div class="create_button">
                <a href="{{route('vendor.withdraw.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus"></i> Realizar pago</a>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <div class="table-responsive">
                {{ $dataTable->table() }}
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
