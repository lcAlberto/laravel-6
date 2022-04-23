<nav
        class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white"
        id="sidenav-main" style="z-index: 200">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('/img/11223.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image" src="{{asset('users/' . current_user()->thumbnail)}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">@lang('labels.Welcome!')</h6>
                    </div>
                    <a href="{{ route('profile.edit', auth()->user()->id) }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>@lang('labels.My') @lang('labels.profile')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>@lang('labels.Activity')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>@lang('labels.Support')</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>@lang('labels.LogOut')</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('/img/11223.png') }}" alt="logo">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2"></i>
                        Dashboard
                    </a>
                </li>
                <!-- item do rebanho -->
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-flock" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fa fa-paste"></i>
                        <span class="nav-link-text">@lang('labels._flock')</span>
                    </a>
                    <div class="collapse show" id="navbar-flock">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('animals.index') }}">
                                    <i class="fa fa-list-ul"></i>@lang('labels.Total')
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cio.index') }}" class="nav-link">
                                    <i class="fa fa-venus-mars mr-2"></i>Ciclo Reprodutivo</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('health.index') }}" class="nav-link">
                                    <i class="fa fa-heartbeat mr-2"></i>Saúde e Tratamentos</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('editor') }}" class="nav-link">
                                    <i class="fa fa-font mr-2"></i>Editor</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('jquery-editor') }}" class="nav-link">
                                    <i class="fa fa-fonticons mr-2"></i>JQuery Editor</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- item dos usuario -->
                <li class="nav-item">
                    <a class="nav-link" href="#navbar-users" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fa fa-users-cog"></i>
                        <span class="nav-link-text">R.H</span>
                    </a>

                    <div class="collapse show" id="navbar-users">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit', auth()->user()->id) }}">
                                    <i class="fa fa-user"></i> @lang('labels.User') @lang('labels.profile')
                                </a>
                            </li>
                            @if(auth()->user()->hasRole(\App\Enums\UserRolesEnum::ADMIN))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                                        <i class="fa fa-user-tie"></i> {{ __('User Management') }}
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>