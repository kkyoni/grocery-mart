<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary bars them" href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to Admin Panel</span>
                </li>
        <li>
            @if(!empty(Auth::user()->avatar))
            <img class="rounded-circle" src="{!!  \Auth::user()->avatar !== '' ? asset("storage/avatar/".\Auth::user()->avatar) : asset('storage/avatar/default.png') !!}" alt="user-img" height="60px" width="60px">
            @else
            <img class="rounded-circle" src="{!! asset('storage/avatar/default.png') !!}" alt="user-img" accept="image/*" height="60px" width="60px">
            @endif
        </li>
        <li>
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <span class="block m-t-xs font-bold">{{  \Auth::user()->name }}<b class="caret"></b></span>
            </a>
            <ul class="dropdown-menu animated fadeInLeft m-t-xs">
                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                <li class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>
        </ul>
    </nav>
</div>
