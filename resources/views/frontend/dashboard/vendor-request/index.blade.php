@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Conviértase en vendedor hoy
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.side-bar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Solicitud de proveedor</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {!!@$content->content!!}
              </div>
            </div>
            <br>
            <div class="wsus__dashboard_profile">
                <div class="wsus__dash_pro_area">
                    <form action="{{route('user.vendor-request.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                            <input type="file" name="shop_image" placeholder="Shop Banner Image">
                        </div>
                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                            <input type="text" name="shop_name" placeholder="Nombre de tienda">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-user-tie" aria-hidden="true"></i>
                                    <input type="text" name="shop_email" placeholder="Correo de tienda">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wsus__dash_pro_single">
                                    <i class="fas fa-user-tie" aria-hidden="true"></i>
                                    <input type="text" name="shop_phone" placeholder="Telefono de tienda">
                                </div>
                            </div>
                        </div>
                        <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie" aria-hidden="true"></i>
                            <input type="text" name="shop_address" placeholder="Dirección de tienda">
                        </div>

                        <div class="wsus__dash_pro_single">
                            <textarea name="about" placeholder="Acerca de ti"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar</button>

                    </form>
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

