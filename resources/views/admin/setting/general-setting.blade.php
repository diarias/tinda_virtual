<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.general-setting-update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nombre del Sitio</label>
                    <input type="text" class="form-control" name="site_name" value="{{@$generalSetting->site_name}}">
                </div>
                <div class="form-group">
                    <label>Diseños</label>
                    <select id="" class="form-control" name="layout">
                        <option {{@$generalSetting->layout == 'LTR' ? 'selected' : ''}} value="LTR">LTR</option>
                        <option {{@$generalSetting->layout == 'RTL' ? 'selected' : ''}} value="RTL">RTL</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Email de Contacto</label>
                    <input type="text" class="form-control" name="contact_email" value="{{@$generalSetting->contact_email}}">
                </div>
                <div class="form-group">
                    <label>Teléfono de Contacto</label>
                    <input type="text" class="form-control" name="contact_phone" value="{{@$generalSetting->contact_phone}}">
                </div>
                <div class="form-group">
                    <label>Dirección de Contacto</label>
                    <input type="text" class="form-control" name="contact_address" value="{{@$generalSetting->contact_address}}">
                </div>
                <div class="form-group">
                    <label>Mapa</label>
                    <input type="text" class="form-control" name="map" value="{{@$generalSetting->map}}">
                </div>
                <div class="form-group">
                    <label>Moneda por defecto</label>
                    <select id="" class="form-control select2" name="default_currency">
                        <option value="">Seleccione...</option>
                        @foreach (config('settings.currency_list') as $currency)
                        <option {{@$generalSetting->currency_name == $currency ? 'selected': ''}} value="{{$currency}}">{{$currency}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Icono de la Moneda</label>
                    <input type="text" class="form-control" name="currency_icon" value="{{@$generalSetting->currency_icon}}">
                </div>
                <div class="form-group">
                    <label>Zona de Tiempo</label>
                    <select id="" class="form-control" name="time_zone">
                        <option value="">Seleccione...</option>
                        @foreach (config('settings.time_zone') as $key => $timeZone)
                        <option {{@$generalSetting->time_zone == $key ? 'selected': ''}} value="{{$key}}">{{$key}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>