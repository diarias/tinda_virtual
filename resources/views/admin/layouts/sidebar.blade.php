{{--
<div class="main-sidebar sidebar-style-2" style="background-color: rgb(0, 0, 0); color: aliceblue">

        <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                        <a style="color: white" href="">{{ $settings->site_name }}</a>
</div>

<a href="javascript:;" class="dash_logo"></a>
<ul class="dashboard_link">



        <li class="menu-header">Panel</li>
        <li class="dropdown active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Panel</span></a>
        </li>

        <li class="menu-header">Acciones</li>
        <li class="dropdown {{ setActive(['admin.category.*', 'admin.sub-category.*', 'admin.child-category.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Administrar categorías</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.category.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.category.index') }}">Categorias</a></li>
                        <li class="{{ setActive(['admin.sub-category.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.sub-category.index') }}">Sub Categorias</a></li>
                        <li class="{{ setActive(['admin.child-category.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.child-category.index') }}">Categoría infantil</a></li>
                </ul>
        </li>

        <li
                class="dropdown {{ setActive([
                                'admin.order.*',
                                'admin.pending-orders',
                                'admin.processed-orders',
                                'admin.dropped-off-orders',
                                'admin.shipped-orders',
                                'admin.out-for-delivery-orders',
                                'admin.delivered-orders',
                                'admin.canceled-orders',
                            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cart-plus"></i>
                        <span>Orders</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.order.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.order.index') }}">Todas las Ordenes</a></li>
                        <li class="{{ setActive(['admin.pending-orders']) }}"><a class="nav-link"
                                        href="{{ route('admin.pending-orders') }}">Todos los pedidos pendientes</a></li>
                        <li class="{{ setActive(['admin.processed-orders']) }}"><a class="nav-link"
                                        href="{{ route('admin.processed-orders') }}">Todos los pedidos procesados</a></li>
                        <li class="{{ setActive(['admin.dropped-off']) }}"><a class="nav-link"
                                        href="{{ route('admin.dropped-off-orders') }}">Todos los pedidos abandonados</a></li>

                        <li class="{{ setActive(['admin.shipped-orders']) }}"><a class="nav-link"
                                        href="{{ route('admin.shipped-orders') }}">Todos los pedidos enviados</a></li>
                        <li class="{{ setActive(['admin.out-for-delivery-orders']) }}"><a class="nav-link"
                                        href="{{ route('admin.out-for-delivery-orders') }}">Todo listo para pedidos de
                                        entrega</a>
                        </li>


                        <li class="{{ setActive(['admin.delivered-orders']) }}"><a class="nav-link"
                                        href="{{ route('admin.delivered-orders') }}">Todos los pedidos entregados</a></li>

                        <li class="{{ setActive(['admin.canceled-orders']) }}"><a class="nav-link"
                                        href="{{ route('admin.canceled-orders') }}">Todos los pedidos cancelados</a></li>

                </ul>
        </li>

        <li class="{{ setActive(['admin.transaction']) }}"><a class="nav-link"
                        href="{{ route('admin.transaction') }}"><i class="far fa-square"></i>
                        <span>Transacciones</span></a>
        </li>

        <li class="dropdown {{ setActive([
                                'admin.brand.*',
                                'admin.products.*',
                                'admin.products-image-gallery.*',
                                'admin.products-variant.*',
                                'admin.products-variant-item.*',
                                'admin.seller-products.*',
                                'admin.seller-pending-products.*',
                            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Administrador de productos</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.brand.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.brand.index') }}">Marcas</a></li>
                        <li
                                class="{{ setActive([
                                        'admin.products.*',
                                        'admin.products-image-gallery.*',
                                        'admin.products-variant.*',
                                        'admin.products-variant-item.*',
                                        'admin.reviews.*',
                                    ]) }}">
                                <a class="nav-link" href="{{ route('admin.products.index') }}">Productos</a>
                        </li>
                        <li class="{{ setActive(['admin.seller-products.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.seller-products.index') }}">Productos más vendidos</a></li>
                        <li class="{{ setActive(['admin.seller-pending-products.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.seller-pending-products.index') }}">Productos Pendientes de
                                        Venta</a>
                        </li>
                        <li class="{{ setActive(['admin.reviews.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.reviews.index') }}">Reseñas de productos</a></li>
                </ul>
        </li>
        <li
                class="dropdown {{ setActive([
                                'admin.vendor-profile.*',
                                'admin.coupons.*',
                                'admin.shipping-rule.*',
                                'admin.payment-settings.index.*',
                            ]) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Comercio electrónico</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.vendor.profile.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.flash-sale.index') }}">Venta express</a></li>
                        <li class="{{ setActive(['admin.coupons.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.coupons.index') }}">Cupones</a></li>
                        <li class="{{ setActive(['admin.shipping-rule.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.shipping-rule.index') }}">Regla de envío</a></li>
                        <li class="{{ setActive(['admin.vendor.profile.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.vendor-profile.index') }}">Perfil de vendedor</a></li>
                        <li class="{{ setActive(['admin.payment-settings.index.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.payment-settings.index') }}">Configuración de pago</a></li>
                </ul>
        </li>



        <li class="dropdown {{ setActive(['admin.slider.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Manage Website</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.slider.index') }}">Slider</a></li>
                        <li class="{{ setActive(['admin.slider.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.home-page-setting') }}">Configuración de la página de inicio</a>
                        </li>
                        <li class="{{ setActive(['admin.vendor-condition.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.vendor-condition.index') }}">Condición del vendedor</a></li>
                        <li class="{{ setActive(['admin.about.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.about.index') }}">Acerca de</a></li>
                        <li class="{{ setActive(['admin.terms-and-conditions.index*']) }}"><a class="nav-link"
                                        href="{{ route('admin.terms-and-conditions.index') }}">Página de términos</a></li>
                </ul>
        </li>

















        <li class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Administrar blog</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.blog-category.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.blog-category.index') }}">Categorias</a></li>
                        <li class="{{ setActive(['admin.blog.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.blog.index') }}">Blog</a></li>
                        <li class="{{ setActive(['admin.blog-comments.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.blog-comments.index') }}">Comentario de Blog</a></li>
                </ul>
        </li>






        <li><a class="nav-link {{ setActive(['admin.messages.index']) }}"
                        href="{{ route('admin.messages.index') }}"><i class="fas fa-user"></i>
                        <span>Mensajes</span></a></li>

        <li
                class="dropdown {{ setActive(['admin.blog-category.*', 'admin.blog.*', 'admin.blog-comments.*', 'admin.withdraw-method.*', 'admin.withdraw.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Gestionar Retiro</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.withdraw-method.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.withdraw-method.index') }}">Métodos WithDraw</a></li>
                        <li class="{{ setActive(['admin.withdraw.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.withdraw.index') }}">Lista de retiro</a></li>
                </ul>
        </li>





        <li class="dropdown {{ setActive(['admin.footer.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                        <span>Mensaje Footer</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ setActive(['admin.footer.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.footer-info.index') }}">Información de Footer</a></li>
                        <li class="{{ setActive(['admin.footer-socials.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.footer-socials.index') }}">Footer Social</a></li>
                        <li class="{{ setActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a></li>
                        <li class="{{ setActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                                        href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a></li>
                </ul>
        </li>

        <li><a class="nav-link {{ setActive(['admin.advertisement.*']) }}"
                        href="{{ route('admin.advertisement.index') }}"><i class="far fa-square"></i><span>Anuncio</span></a>
        </li>

        <li><a class="nav-link {{ setActive(['admin.subscribers.*']) }}"
                        href="{{ route('admin.subscribers.index') }}"><i
                                class="far fa-square"></i><span>Suscriptores</span></a></li>

        <li><a class="nav-link {{ setActive(['admin.settings.*']) }}" href="{{ route('admin.settings.index') }}"><i
                                class="far fa-square"></i><span>Configuración</span></a>
        </li>
        {{-- <li class="dropdown">
                                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                                        <ul class="dropdown-menu">
                                                <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                                                <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                                                <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                                        </ul>
                                        </li>
                                        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

        {{--

                                        <li
                            class="dropdown {{ setActive([
                                'admin.vendor-requests.index',
                                'admin.customer.index',
                                'admin.vendor-list.index',
                                'admin.manage-user.index',
                                'admin-list.index',
                            ]) }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                <span>Users</span></a>
        <ul class="dropdown-menu">
                <li class="{{ setActive(['admin.customer.index']) }}"><a class="nav-link"
                                href="{{ route('admin.customer.index') }}">Lista de clientes</a></li>
                <li class="{{ setActive(['admin.vendor-list.index']) }}"><a class="nav-link"
                                href="{{ route('admin.vendor-list.index') }}">Lista de vendedores</a></li>

                <li class="{{ setActive(['admin.vendor-requests.index']) }}"><a class="nav-link"
                                href="{{ route('admin.vendor-requests.index') }}">Proveedores pendientes</a></li>

                <li class="{{ setActive(['admin.manage-user.index']) }}"><a class="nav-link"
                                href="{{ route('admin.manage-user.index') }}">Administrar usuario</a></li>

                <li class="{{ setActive(['admin.admin-list.index']) }}"><a class="nav-link"
                                href="{{ route('admin.admin-list.index') }}">Listas de administrador</a></li>
        </ul>
        </li>







</ul>

</aside>






</div>
--}}


<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->

        <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="./index.html" class="brand-link d-flex flex-column">
                        <!--begin::Brand Image-->
                        <img src="{{ asset(auth()->user()->image) }}" alt="AdminLTE Logo" class="brand-image opacity-75 shadow rounded-circle" style="width: 80px; height: 80px;" class="mb-5">
                        <!--end::Brand Image-->
                        <!--begin::Brand Text-->
                        <span class="brand-text fw-light">Tienda Apliti</span>
                        <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->



        <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                                <li class="nav-item menu-open">
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                                                <i class="fa fa-home" aria-hidden="true"></i>
                                                                <p>Inicio</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                <p>Admin. de Categorias<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.category.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Categorias</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.sub-category.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Sub. Categorias</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.child-category.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Categoria Hija</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                <p>Admin. de Ordenes<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.order.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Todas las ordenes</p>
                                                        </a>
                                                </li>


                                                <li class="nav-item">
                                                        <a href="{{ route('admin.pending-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes Pendientes</p>
                                                        </a>
                                                </li>





                                                <li class="nav-item">
                                                        <a href="{{ route('admin.processed-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes Procesadas</p>
                                                        </a>
                                                </li>



                                                <li class="nav-item">
                                                        <a href="{{ route('admin.dropped-off-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes No Realizadas</p>
                                                        </a>
                                                </li>






                                                <li class="nav-item">
                                                        <a href="{{ route('admin.shipped-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes Enviadas</p>
                                                        </a>
                                                </li>



                                                <li class="nav-item">
                                                        <a href="{{ route('admin.out-for-delivery-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes Listas Entrega</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.delivered-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes Entregadas</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.canceled-orders') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Ordenes Canceladas</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="{{ route('admin.transaction') }}" class="nav-link">
                                                <i class="fas fa-comment-dollar" aria-hidden="true"></i>
                                                <p>Transacciones</p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fas fa-truck-loading" aria-hidden="true"></i>
                                                <p>Admin. Productos<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.brand.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Marcas</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.products.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Productos</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.seller-products.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Productos más vendidos</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.seller-pending-products.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Productos pendientes por aprobar</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.reviews.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Reseñas de productos</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fas fa-balance-scale" aria-hidden="true"></i>
                                                <p>Reglas de Comercio<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.flash-sale.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Fecha de Venta Express</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.coupons.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Cupones</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.shipping-rule.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Reglas de Envío</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.vendor-profile.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Perfil mí Tienda</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.payment-settings.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Configuraciones de pago</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fas fa-cogs" aria-hidden="true"></i>
                                                <p>Admin. Sitio<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.slider.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Slider</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.home-page-setting') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Config. Página</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.vendor-condition.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Terminos y Condiciones (Vendedor)</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.about.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Acerca de Nosotros</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.terms-and-conditions.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Terminos</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fas fa-cogs" aria-hidden="true"></i>
                                                <p>Admin. Blog<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.blog-category.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Categorias</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.blog.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Blog</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.blog-comments.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Comentarios Blog</p>
                                                        </a>
                                                </li>
                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="{{ route('admin.messages.index') }}" class="nav-link">
                                                <i class="fas fa-envelope-open-text" aria-hidden="true"></i>
                                                <p>Mensajes</p>
                                        </a>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fas fa-piggy-bank" aria-hidden="true"></i>
                                                <p>Retiros y tranferencias<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.withdraw-method.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Método de Retiro</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.withdraw.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Lista de Retiros</p>
                                                        </a>
                                                </li>

                                        </ul>
                                </li>
                                <li class="nav-item">
                                        <a href="#" class="nav-link">
                                                <i class="fas fa-piggy-bank" aria-hidden="true"></i>
                                                <p>Config. Pie de Página<i class="nav-arrow bi bi-chevron-right"></i></p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.footer-info.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Información Pie de Página</p>
                                                        </a>
                                                </li>
                                                <li class="nav-item">
                                                        <a href="{{ route('admin.withdraw.index') }}" class="nav-link">
                                                                <i class="nav-icon bi bi-circle"></i>
                                                                <p>Lista de Retiros</p>
                                                        </a>
                                                </li>

                                        </ul>
                                </li>








                                <hr>


                                <li class="nav-item">
                                        <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-seam-fill"></i>
                                                <p>
                                                        Widgets
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./widgets/small-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Small Box</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./widgets/info-box.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>info Box</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./widgets/cards.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Cards</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-clipboard-fill"></i>
                                                <p>
                                                        Layout Options
                                                        <span class="nav-badge badge text-bg-secondary me-3">6</span> <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./layout/unfixed-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Default Sidebar</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./layout/fixed-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Fixed Sidebar</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./layout/layout-custom-area.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Layout <small>+ Custom Area </small></p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./layout/sidebar-mini.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Sidebar Mini</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./layout/collapsed-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Sidebar Mini <small>+ Collapsed</small></p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./layout/logo-switch.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Sidebar Mini <small>+ Logo Switch</small></p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./layout/layout-rtl.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Layout RTL</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-tree-fill"></i>
                                                <p>
                                                        UI Elements
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./UI/general.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>General</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./UI/icons.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Icons</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./UI/timeline.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Timeline</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                                                <p>
                                                        Forms
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./forms/general.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>General Elements</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-table"></i>
                                                <p>
                                                        Tables
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./tables/simple.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Simple Tables</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-header">EXAMPLES</li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                                <p>
                                                        Auth
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                                                <p>
                                                                        Version 1
                                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                                </p>
                                                        </a>
                                                        <ul class="nav nav-treeview">
                                                                <li class="nav-item"> <a href="./examples/login.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                                <p>Login</p>
                                                                        </a> </li>
                                                                <li class="nav-item"> <a href="./examples/register.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                                <p>Register</p>
                                                                        </a> </li>
                                                        </ul>
                                                </li>
                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                                                <p>
                                                                        Version 2
                                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                                </p>
                                                        </a>
                                                        <ul class="nav nav-treeview">
                                                                <li class="nav-item"> <a href="./examples/login-v2.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                                <p>Login</p>
                                                                        </a> </li>
                                                                <li class="nav-item"> <a href="./examples/register-v2.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                                <p>Register</p>
                                                                        </a> </li>
                                                        </ul>
                                                </li>
                                                <li class="nav-item"> <a href="./examples/lockscreen.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Lockscreen</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-header">DOCUMENTATIONS</li>
                                <li class="nav-item"> <a href="./docs/introduction.html" class="nav-link"> <i class="nav-icon bi bi-download"></i>
                                                <p>Installation</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="./docs/layout.html" class="nav-link"> <i class="nav-icon bi bi-grip-horizontal"></i>
                                                <p>Layout</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="./docs/color-mode.html" class="nav-link"> <i class="nav-icon bi bi-star-half"></i>
                                                <p>Color Mode</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-ui-checks-grid"></i>
                                                <p>
                                                        Components
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./docs/components/main-header.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Main Header</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="./docs/components/main-sidebar.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Main Sidebar</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-filetype-js"></i>
                                                <p>
                                                        Javascript
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="./docs/javascript/treeview.html" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Treeview</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="./docs/browser-support.html" class="nav-link"> <i class="nav-icon bi bi-browser-edge"></i>
                                                <p>Browser Support</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="./docs/how-to-contribute.html" class="nav-link"> <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                                                <p>How To Contribute</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="./docs/faq.html" class="nav-link"> <i class="nav-icon bi bi-question-circle-fill"></i>
                                                <p>FAQ</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="./docs/license.html" class="nav-link"> <i class="nav-icon bi bi-patch-check-fill"></i>
                                                <p>License</p>
                                        </a> </li>
                                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                                                <p>Level 1</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                                                <p>
                                                        Level 1
                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Level 2</p>
                                                        </a> </li>
                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>
                                                                        Level 2
                                                                        <i class="nav-arrow bi bi-chevron-right"></i>
                                                                </p>
                                                        </a>
                                                        <ul class="nav nav-treeview">
                                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-record-circle-fill"></i>
                                                                                <p>Level 3</p>
                                                                        </a> </li>
                                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-record-circle-fill"></i>
                                                                                <p>Level 3</p>
                                                                        </a> </li>
                                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-record-circle-fill"></i>
                                                                                <p>Level 3</p>
                                                                        </a> </li>
                                                        </ul>
                                                </li>
                                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle"></i>
                                                                <p>Level 2</p>
                                                        </a> </li>
                                        </ul>
                                </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                                                <p>Level 1</p>
                                        </a> </li>
                                <li class="nav-header">LABELS</li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-danger"></i>
                                                <p class="text">Important</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-warning"></i>
                                                <p>Warning</p>
                                        </a> </li>
                                <li class="nav-item"> <a href="#" class="nav-link"> <i class="nav-icon bi bi-circle text-info"></i>
                                                <p>Informational</p>
                                        </a> </li>
                        </ul> <!--end::Sidebar Menu-->
                </nav>
        </div> <!--end::Sidebar Wrapper-->




</aside>