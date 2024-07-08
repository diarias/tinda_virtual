@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Crear solicitud de retiro
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
            <h3><i class="far fa-user"></i>Petición de retiro</h3>
            <div class="wsus__dashboard_profile">
              <div class="row">
                <div class="wsus__dash_pro_area col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>
                                  Método de retiro</b></td>
                                <td>{{ $request->method }}</td>
                            </tr>
                            <tr>
                                <td><b>
                                  Retirar cargo</b></td>
                                <td>{{ ($request->withdraw_charge / $request->total_amount) * 100 }} %</td>
                            </tr>

                            <tr>
                                <td><b>Monto del cargo de retiro</b></td>
                                <td>{{ $settings->currency_icon }} {{ $request->withdraw_charge }}</td>
                            </tr>
                            <tr>
                                <td><b>
                                  Cantidad total</b></td>
                                <td>{{ $settings->currency_icon }} {{ $request->total_amount }}</td>
                            </tr>
                            <tr>
                                <td><b>Withdraw Amount</b></td>
                                <td>{{ $settings->currency_icon }} {{ $request->withdraw_amount }}</td>
                            </tr>
                            <tr>
                                <td><b>Estado</b></td>
                                <td>
                                    @if ($request->status == 'pending')
                                        <span class="badge bg-warning">Pendiente</span>
                                    @elseif($request->status == 'paid')
                                    <span class="badge bg-success">Pagado</span>
                                    @else
                                    <span class="badge bg-danger">Rechazado</span>

                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Información de la cuenta</b></td>
                                <td>{!! $request->account_info !!}</td>
                            </tr>
                        </tbody>
                    </table>
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


