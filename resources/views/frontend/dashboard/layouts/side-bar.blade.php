  <div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    {{--{{asset($logoSetting->logo)}}--}}
    <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a class="{{setActive(['user.dashboard'])}}" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Panel</a></li>
      <li><a class="{{setActive(['user.messages.index'])}}" href="{{route('user.messages.index')}}"><i class="fas fa-tachometer"></i>Mensajes</a></li>
      <li><a class="" href="{{url('/')}}"><i class="fas fa-home"></i>Ir a pagina de inicio</a></li>

      @if (auth()->user()->role === 'vendor')
      <li><a class="{{setActive(['vendor.dashbaord'])}}" href="{{route('vendor.dashbaord')}}"><i class="fas fa-tachometer"></i>Ir al panel de proveedores</a></li>
      @endif


      <li><a class="{{setActive(['user.orders.*'])}}" href="{{route('user.orders.index')}}"><i class="fas fa-list-ul"></i> Ordenes</a></li>
      <li><a class="{{setActive(['user.review.*'])}}" href="{{route('user.review.index')}}"><i class="far fa-star"></i> Reseñas</a></li>

      {{-- <li><a class="{{setActive(['user.profile'])}}" href="{{route('user.profile')}}"><i class="far fa-user"></i> Mi perfil</a></li>
       --}} 
       <li><a class="{{setActive(['user.address.*'])}}" href="{{route('user.address.index')}}"><i class="fal fa-gift-card"></i> Direcciones</a></li>
      @if (auth()->user()->role !== 'vendor')
      <li><a class="{{setActive(['user.vendor-request.*'])}}" href="{{route('user.vendor-request.index')}}"><i class="far fa-user"></i> Solicitud para ser vendedor</a></li>
      @endif
      <li>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Cerrar sesión</a>
        </form>
        </li>

    </ul>
  </div>