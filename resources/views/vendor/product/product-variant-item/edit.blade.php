@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Artículo de variante de producto
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('vendor.layouts.side-bar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <a href="{{route('vendor.products-variant-item.index', ['productId' => $variantItem->productVariant->product_id, 'variantId' => $variantItem->product_variant_id])}}" class="btn btn-warning mt-3 mb-3"><i class="fas fa-long-arrow-left"></i> Back</a>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-sun"></i> Artículo de variante de producto del proveedor</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.products-variant-item.update', $variantItem->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group wsus__input">
                        <label>Nombre de Variante</label>
                        <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                    </div>
                    <div class="form-group wsus__input">
                        <label>Nombre del Item</label>
                        <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label>Precio <code>(0 para hacerlo gratis)</code></label>
                        <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                    </div>
                    <div class="form-group wsus__input">
                        <label for="inputState">Por Defecto</label>
                        <select id="inputState" class="form-control" name="is_default">
                            <option value="">Seleccione</option>
                            <option {{$variantItem->is_default == 1 ? 'selected':''}} value="1">Sí</option>
                            <option {{$variantItem->is_default == 0 ? 'selected':''}} value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group wsus__input">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" name="status">
                            <option {{$variantItem->status == 1 ? 'selected':''}} value="1">Activo</option>
                            <option {{$variantItem->status == 0 ? 'selected':''}} value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
