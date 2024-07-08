@extends('vendor.layouts.master')

@section('title')
{{$settings->site_name}} || 
Artículo de variante de producto
@endsection

@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
    @include('vendor.layouts.side-bar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <a href="{{route('vendor.products-variant.index', ['product'=> $product->id])}}" class="btn btn-warning mt-3 mb-3"><i class="fas fa-long-arrow-left"></i> Back</a>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-sun"></i> Artículo de variante de producto del proveedor</h3>
            <h4>Variant: {{$variant->name}}</h4>
            <div class="create_button">
              <a href="{{route('vendor.products-variant-item.create', ['productId' => $product->id, 'variantId' => $variant->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i>Create</a>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {{$dataTable->table()}}
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
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');
          $.ajax({
            url: "{{route('vendor.products-variant-item.changeStatus')}}",
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