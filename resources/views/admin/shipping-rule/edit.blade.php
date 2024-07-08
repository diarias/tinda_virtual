@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Shipping Rule</h1>
        </div>
  
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Shipping Rules</h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.shipping-rule.update', $shippingrule->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="name" value="{{$shippingrule->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Tipo</label>
                                    <select id="" class="form-control shipping-type" name="type">
                                        <option {{$shippingrule->type == 'flat_cost' ? 'selected' : ''}} value="flat_cost">Costo Fijo</option>
                                        <option {{$shippingrule->type == 'min_cost' ? 'selected' : ''}} value="min_cost">Valor de Orden Minima</option>
                                    </select>
                                </div>
                                <div class="form-group min_cost {{$shippingrule->type == 'min_cost' ? '' : 'd-none'}}">
                                    <label>Monto mínimo</label>
                                    <input type="text" class="form-control" name="min_cost" value="{{$shippingrule->min_cost}}">
                                </div>
                                <div class="form-group">
                                    <label>Costo</label>
                                    <input type="text" class="form-control" name="cost" value="{{$shippingrule->cost}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputState">Estado</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option {{$shippingrule->status == 1 ? 'selected' : ''}} value="1">Activo</option>
                                        <option {{$shippingrule->status == 0 ? 'selected' : ''}} value="0">Inactivo</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Editar</button>
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
        $('body').on('change','.shipping-type', function(){
             let value = $(this).val();
             if(value != 'min_cost'){
                $('.min_cost').addClass('d-none');
             }else{
                $('.min_cost').removeClass('d-none');
             }
        })
    })
</script>
    
@endpush