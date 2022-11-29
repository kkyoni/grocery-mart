<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img src="" alt="image" class="rounded-circle" height="60px" width="60px">
                    <ul class="dropdown-menu animated fadeInLeft m-t-xs">
                        <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img alt="image" class="rounded-circle" height="60px" width="60px" src="">
                </div>
            </li>
            <li class="@if(Request::segment('1') == 'home') active @endif" data-toggle="tooltip" title="Dashboard">
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">
                        Dashboard
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'user') active @endif" data-toggle="tooltip" title="User">
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="nav-label">
                        User
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'blog') active @endif" data-toggle="tooltip" title="Blog">
                <a href="{{ route('blog.index') }}">
                    <i class="fa fa-rss"></i>
                    <span class="nav-label">
                        Blog
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'cms') active @endif" data-toggle="tooltip" title="Cms">
                <a href="{{ route('cms.index') }}">
                    <i class="fa fa-file-text"></i>
                    <span class="nav-label">
                        Cms
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'contact') active @endif" data-toggle="tooltip" title="Contact">
                <a href="{{ route('contact.index') }}">
                    <i class="fa fa-phone-square"></i>
                    <span class="nav-label">
                        Contact
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'faq') active @endif" data-toggle="tooltip" title="Faq">
                <a href="{{ route('faq.index') }}">
                    <i class="fa fa-industry"></i>
                    <span class="nav-label">
                        Faq
                    </span>
                </a>
            </li>

            <li class="@if(Request::segment('1') == 'slider') active @endif" data-toggle="tooltip" title="Slider">
                <a href="{{ route('slider.index') }}">
                    <i class="fa fa-sliders"></i>
                    <span class="nav-label">
                        Slider
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'category') active @endif" data-toggle="tooltip" title="Category">
                <a href="{{ route('category.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span class="nav-label">
                        Category
                    </span>
                </a>
            </li>
            <li class="@if(Request::segment('1') == 'product') active @endif" data-toggle="tooltip" title="Product">
                <a href="{{ route('product.index') }}">
                    <i class="fa fa-product-hunt"></i>
                    <span class="nav-label">
                        Product
                    </span>
                </a>
            </li>

            <li class="@if(Request::segment('1') == 'settings') active @endif" data-toggle="tooltip" title="Settings">
                <a href="{{ url('settings') }}">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">Settings</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
