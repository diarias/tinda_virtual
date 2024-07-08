<div class="dashboard_sidebar">
  <span class="close_icon">
    <i class="far fa-bars dash_bar"></i>
    <i class="far fa-times dash_close"></i>
  </span>

  <a href="javascript:;" class="dash_logo"><img src="{{asset($logoSetting->logo)}}" alt="logo" class="img-fluid"></a>
  <ul class="dashboard_link">
    <li><a class="{{setActive(['vendor.dashbaord'])}}" href="{{route('vendor.dashboard')}}"><i class="fas fa-tachometer"></i>Panel</a></li>
    <li><a class="" href="{{route('home')}}"><i class="fas fa-home"></i>Ir a inicio</a></li>
    <li><a class="" href="{{route('vendor.messages.index')}}"><i class="fas fa-home"></i>Mensajes</a></li>
    <li><a class="{{setActive(['vendor.orders.*'])}}" href="{{route('vendor.orders.index')}}"><i class="fas fa-box"></i> Ordenes</a></li>

    <li><a class="{{setActive(['vendor.products.*'])}}" href="{{route('vendor.products.index')}}"><i class="fas fa-cart-plus"></i> Productos</a></li>
    <li><a class="{{setActive(['vendor.reviews.index'])}}" href="{{route('vendor.reviews.index')}}"><i class="fas fa-star"></i> Revisar</a></li>

    <li><a class="{{setActive(['vendor.withdraw.index'])}}" href="{{route('vendor.withdraw.index')}}"><i class="fas fa-star"></i> Mi retiro</a></li>

    <li><a class="{{setActive(['vendor.shop-profile.index'])}}" href="{{route('vendor.shop-profile.index')}}"><i class="far fa-user"></i> Perfil de la tienda</a></li>
    <li><a class="{{setActive(['vendor.profile'])}}" href="{{route('vendor.profile')}}"><i class="far fa-user"></i> Mi perfil</a></li><li>

      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a href="{{route('logout')}}" onclick="event.preventDefault();
          this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Cerrar sesión</a>
      </form>
      </li>

  </ul>
  
</div>