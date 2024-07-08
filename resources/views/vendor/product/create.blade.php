@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || Vendedor
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('vendor.layouts.side-bar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-sun"></i> Crear Producto</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{route('vendor.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group wsus__input">
                         <label>Imagen</label>
                         <input type="file" class="form-control" name="image">
                     </div>
                     <div class="form-group wsus__input">
                         <label>Nombre</label>
                         <input type="text" class="form-control" name="name" value="{{old('name')}}">
                     </div>
                     <div class="row">
                       <div class="col-md-4">
                         <div class="form-group wsus__input">
                           <label for="inputState">Categoria</label>
                           <select id="inputState" class="form-control main-category" name="category">
                               <option value="">Seleccione..</option>
                               @foreach ($categories as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option>
                               @endforeach
                           </select>
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group wsus__input">
                           <label for="inputState">Sub Categoria</label>
                           <select id="inputState" class="form-control sub-category" name="sub_category">
                             <option value="">Seleccione..</option>

                           </select>
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group wsus__input">
                           <label for="inputState">Categoria Hija</label>
                           <select id="inputState" class="form-control child-category" name="child_category">
                             <option value="">Seleccione..</option>

                           </select>
                         </div>
                       </div>
                     </div>
                       <div class="form-group wsus__input">
                         <label for="inputState">Marca</label>
                         <select id="inputState" class="form-control" name="brand">
                           <option value="">Seleccione..</option>
                           @foreach ($brands as $brand)
                           <option value="{{$brand->id}}">{{$brand->name}}</option>
                           @endforeach
                         </select>
                       </div>
                       <div class="form-group wsus__input">
                         <label>Sku</label>
                         <input type="text" class="form-control" name="sku" value="{{old('sku')}}">
                       </div>

                       <div class="form-group wsus__input">
                         <label>Precio</label>
                         <input type="text" class="form-control" name="price" value="{{old('price')}}">
                       </div>

                       <div class="form-group wsus__input">
                         <label>Precio de Oferta</label>
                         <input type="text" class="form-control" name="offer_price" value="{{old('offer_price')}}">
                       </div>

                       <div class="row">
                         <div class="col-md-6">
                           <div class="form-group wsus__input">
                             <label>Fecha de inicio de la oferta</label>
                             <input type="text" class="form-control datepicker" name="offer_start_date" value="{{old('offer_start_date')}}">
                          </div>
                         </div>
                         <div class="col-md-6">
                           <div class="form-group wsus__input">
                             <label>Fecha fin de la oferta</label>
                             <input type="text" class="form-control datepicker" name="offer_end_date" value="{{old('offer_end_date')}}">
                           </div>
                         </div>
                       </div>
                     
                       <div class="form-group wsus__input">
                         <label>Cantidad de Stock</label>
                         <input type="number" min="0" class="form-control" name="qty" value="{{old('qty')}}">
                       </div>

                       <div class="form-group wsus__input">
                         <label>Video Link</label>
                         <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}">
                       </div>

                       <div class="form-group wsus__input">
                         <label>Descripcion Corta</label>
                         <textarea name="short_description" class="form-control"></textarea>
                       </div>

                       <div class="form-group wsus__input">
                         <label>Descripcion Larga</label>
                         <textarea name="long_description" class="form-control summernote"></textarea>
                       </div>

                     <div class="form-group wsus__input">
                         <label for="inputState">Estado</label>
                         <select id="inputState" class="form-control" name="status">
                             <option value="1">Activo</option>
                             <option value="0">Inactivo</option>
                         </select>
                     </div>

                        {{-- <div class="form-group wsus__input">
                           <label for="inputState">Tipo de Producto</label></label>
                           <select id="inputState" class="form-control" name="product_type">
                               <option value="">seleccione..</option>
                               <option value="new_arrival">Nuevo</option>
                               <option value="featured_product">Presentando</option>
                               <option value="top_product">Producto Top</option>
                               <option value="best_product">El mejor Producto</option>
                           </select>
                         </div>--}}

                     <div class="form-group wsus__input">
                       <label>Seo Titulo</label>
                       <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
                     </div>

                     <div class="form-group wsus__input">
                       <label>Descripcion Seo</label>
                       <textarea name="seo_description" class="form-control"></textarea>
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
@push('scripts')
  <script>
    $(document).ready(function(){
      $('body').on('change','.main-category',function(e){
        let id = $(this).val();
        $.ajax({
            method: 'GET',
            url: "{{route('vendor.product.get-subcategories')}}",
            data: {
              id:id
            },
            success: function(data){
              console.log(data);
              $('.sub-category').html('<option value="">Selecciona...</option>')
              $.each(data, function(i, item){
                $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
              })
            },
            error: function(xhr, status, error){
              console.log(error);
            }
        })
      })
      //get child categories
      $('body').on('change','.sub-category',function(e){
        let id = $(this).val();
        $.ajax({
            method: 'GET',
            url: "{{route('vendor.product.get-childcategories')}}",
            data: {
              id:id
            },
            success: function(data){
              console.log(data);
              $('.child-category').html('<option value="">Selecciona...</option>')
              $.each(data, function(i, item){
                $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
              })
            },
            error: function(xhr, status, error){
              console.log(error);
            }
        })
      })
    })
  </script>
@endpush
