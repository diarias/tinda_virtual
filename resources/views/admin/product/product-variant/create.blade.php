@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Product Variant</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create Product Variant</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.products-variant.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="product" value="{{request()->product}}">
                        </div>
                        <div class="form-group">
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
        </section>
@endsection
