<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img src="{{ url(\Settings::get('application_logo')) }}" alt="image" class="rounded-circle"
                        height="60px" width="60px" style="border-radius:20%!important">
                </div>
                <div class="logo-element">
                    <img alt="image" class="rounded-circle" height="60px" width="60px"
                        style="border-radius:20%!important" src="{{ url(\Settings::get('application_logo')) }}">
                </div>
            </li>
            <li class="@if (Request::segment('2') == 'dashboard') active @endif" data-toggle="tooltip" title="Dashboard">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'user') active @endif" data-toggle="tooltip" title="Users">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">Users</span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'blog') active @endif" data-toggle="tooltip" title="Blog">
                <a href="{{ route('admin.blog.index') }}">
                    <i class="fa fa-rss"></i>
                    <span class="nav-label">
                        Blog
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'cms') active @endif" data-toggle="tooltip" title="CMS">
                <a href="{{ route('admin.cms.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span class="nav-label">
                        Cms
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'contact') active @endif" data-toggle="tooltip" title="Contact">
                <a href="{{ route('admin.contact.index') }}">
                    <i class="fa fa-phone-square"></i>
                    <span class="nav-label">
                        Contact
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'faq') active @endif" data-toggle="tooltip" title="FAQ">
                <a href="{{ route('admin.faq.index') }}">
                    <i class="fa fa-industry"></i>
                    <span class="nav-label">
                        Faq
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'brand') active @endif" data-toggle="tooltip" title="Brand">
                <a href="{{ route('admin.brand.index') }}">
                    <i class="fa fa-first-order"></i>
                    <span class="nav-label">
                        Brand
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'categories') active @endif" data-toggle="tooltip" title="Categories">
                <a href="{{ route('admin.categories.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span class="nav-label">
                        Categories
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'product') active @endif" data-toggle="tooltip" title="Product">
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-product-hunt"></i>
                    <span class="nav-label">
                        Product
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'promo') active @endif" data-toggle="tooltip" title="Promo">
                <a href="{{ route('admin.promo.index') }}">
                    <i class="fa fa-gift"></i>
                    <span class="nav-label">
                        Promo Code
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'order') active @endif" data-toggle="tooltip" title="Order">
                <a href="{{ route('admin.order.index') }}">
                    <i class="fa fa-exchange"></i>
                    <span class="nav-label">
                        Order
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'activitylog') active @endif" data-toggle="tooltip" title="Activity Log">
                <a href="{{ route('admin.user.activitylog') }}">
                    <i class="fa fa-tasks"></i>
                    <span class="nav-label">
                        Activity Log
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('2') == 'support') active @endif" data-toggle="tooltip" title="Support">
                <a href="{{ route('admin.support.index') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="nav-label">
                        Support
                    </span>
                </a>
            </li>
            <li class="@if (Request::segment('1') == 'settings') active @endif" data-toggle="tooltip" title="Setting">
                <a href="{{ url('settings') }}">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">Setting </span>
                </a>
            </li>
        </ul>
    </div>
</nav>
