@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Image Gallery</h1>
          </div>
          <div class="mb-3">
            <a href="{{route('admin.products.index')}}" class="btn btn-info">Back</a>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Upload Image for {{$product->name}}</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.products-image-gallery.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Imagen <code>(Soporta muchas imagenes!)</code></label>
                          <input type="file" name="image[]" class="form-control" multiple>
                          <input type="hidden" name="product" value="{{$product->id}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Cargar</button>
                    </form>
                  </div>
                </div>
              </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Products Images</h4>
                  </div>
                  <div class="card-body">
                    {{$dataTable->table()}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush