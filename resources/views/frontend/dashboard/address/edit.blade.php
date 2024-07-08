@extends('frontend.dashboard.layouts.master')

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.side-bar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="fal fa-gift-card"></i>Editar Direcciòn</h3>
                        <div class="wsus__dashboard_add wsus__add_address">
                            <form action="{{route('user.address.update', $addresses->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Nombre <b>*</b></label>
                                            <input type="text" placeholder="Name" name="name" value="{{$addresses->name}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Correo</label>
                                            <input type="email" placeholder="Email" name="email" value="{{$addresses->email}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Telèfono <b>*</b></label>
                                            <input type="text" placeholder="Phone" name="phone" value="{{$addresses->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Paìs <b>*</b></label>
                                            <div class="wsus__topbar_select">
                                                <select class="select_2" name="country">
                                                    <option>Seleccione</option>
                                                    @foreach (config('settings.country_list') as $country)
                                                    <option {{$country == $addresses->country ?  'selected' : ''}} value="{{$country}}">{{$country}}</option>  
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Provincia <b>*</b></label>
                                            <input type="text" placeholder="state" name="state" value="{{$addresses->state}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Ciudad <b>*</b></label>
                                            <input type="text" placeholder="City" name="city" value="{{$addresses->city}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Código postal<b>*</b></label>
                                            <input type="text" placeholder="Zip Code" name="zip" value="{{$addresses->zip}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="wsus__add_address_single">
                                            <label>Direcciòn <b>*</b></label>
                                            <input type="text" placeholder="Address" name="address" value="{{$addresses->address}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <button type="submit" class="common_btn">Editar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
