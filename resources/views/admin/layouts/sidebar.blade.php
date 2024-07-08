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
                
                        <li     class="dropdown {{ setActive([
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