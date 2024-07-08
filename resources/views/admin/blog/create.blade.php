@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Blog</h1>

          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Crear Blog</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.blog.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                        </div>


                        <div class="form-group">
                            <label for="inputState">Categoria</label>
                            <select id="inputState" class="form-control main-category" name="category">
                                <option value="">Selecciona</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea name="description" class="form-control summernote"></textarea>
                        </div>



                        <div class="form-group">
                            <label>Titulo SEO (escribe el titulo con una sepración de guion bajo)</label>
                            <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
                        </div>

                        <div class="form-group">
                            <label>Descripcion SEO</label>
                            <textarea name="seo_description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Estado</label>
                            <select id="inputState" class="form-control" name="status">
                              <option value="1">Activo</option>
                              <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Crear</button>
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

    </script>
@endpush
