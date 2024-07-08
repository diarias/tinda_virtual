@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant Items</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Update Product Variant Item</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.products-variant-item.update', $variantItem->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Nombre de Variante</label>
                            <input type="text" class="form-control" name="variant_name" value="{{$variantItem->productVariant->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nombre del Item</label>
                            <input type="text" class="form-control" name="name" value="{{$variantItem->name}}">
                        </div>
                        <div class="form-group">
                            <label>Precio <code>(0 para hacerlo gratis)</code></label>
                            <input type="text" class="form-control" name="price" value="{{$variantItem->price}}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Por Defecto</label>
                            <select id="inputState" class="form-control" name="is_default">
                                <option value="">Seleccione</option>
                                <option {{$variantItem->is_default == 1 ? 'selected':''}} value="1">Sí</option>
                                <option {{$variantItem->is_default == 0 ? 'selected':''}} value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group">
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
        </section>
@endsection
