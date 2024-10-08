@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Child Category</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Child Category</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.child-category.update', $childcategory->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="inputState">Categoria</label>
                          <select id="inputState" class="form-control main-category" name="category">
                              <option value="">Selecciona...</option>
                              @foreach ($categories as $category)
                                <option {{$category->id == $childcategory->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="inputState">Sub Categoria</label>
                          <select id="inputState" class="form-control sub-category" name="sub_category">
                              <option value="">Selecciona...</option>
                              @foreach ($subCategories as $subCategory)
                              <option {{$subCategory->id == $childcategory->subcategory_id ? 'selected':''}} value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{$childcategory->name}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputState">Estado</label>
                            <select id="inputState" class="form-control" name="status">
                                <option {{$childcategory->status == 1 ? 'selected' : ''}} value="1">Activo</option>
                                <option {{$childcategory->status == 0 ? 'selected' : ''}} value="0">Inactivo</option>
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

@push('scripts')
  <script>
    $(document).ready(function(){
      $('body').on('change','.main-category',function(e){
        let id = $(this).val();
        $.ajax({
            method: 'GET',
            url: "{{route('admin.get-subcategories')}}",
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
    })
  </script>
@endpush
