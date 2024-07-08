@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Flash Sale</h1>
          </div>
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Flash Sale End Date</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.flash-sale.update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="form-group">
                              <label>Fecha Fin de la Venta</label>
                              <input type="text" class="form-control datepicker" name="end_date" value="{{@$flashSaleDate->end_date}}">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Guardar
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add Flash Sale Products</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.flash-sale.add-product')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label>Productos</label>
                          <select name="product" class="form-control select2">
                            <option value="">Seleccione...</option>
                            @foreach ($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mostrar en el inicio</label>
                                    <select name="show_at_home" class="form-control select2">
                                      <option value="">Seleccione...</option>
                                      <option value="1">Sí</option>
                                      <option value="0">No</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select name="status" class="form-control select2">
                                      <option value="">Seleccione...</option>
                                      <option value="1">Activo</option>
                                      <option value="0">Inactivo</option>
                                    </select>
                                  </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Flash Sale Products</h4>
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
    <script>
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');
          $.ajax({
            url: "{{route('admin.flash-sale-status')}}",
            method: 'PUT',
            data: {
              status: isChecked,
              id: id
            },
            success: function(data){
              //console.log(data);
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
          
        })
        /**change show at home status */
        $('body').on('click', '.change-at-home-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');
          $.ajax({
            url: "{{route('admin.flash-sale.show-at-home.change-status')}}",
            method: 'PUT',
            data: {
              status: isChecked,
              id: id
            },
            success: function(data){
              //console.log(data);
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
          
        })
    })
    </script>
@endpush