@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Crear producto
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('vendor.layouts.side-bar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-sun"></i>Variante de producto del proveedor</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.products-variant.store')}}" method="POST">
                    @csrf
                    <div class="form-group wsus__input">
                        <label>Nombre</label>
                        <input type="text" class="form-control" name="name" value="">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control" name="product" value="{{request()->product}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" name="status">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
