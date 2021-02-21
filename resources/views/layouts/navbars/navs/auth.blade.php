<nav
    class="navbar navbar-top col-10 col-lg-12 navbar-expand-lg navbar-dark navbar-ṕrocriare position-fixed d-md-block d-none">
    {{--style="background-color: rgba(0,0,0,0.5); box-shadow: 20px 10px 5px rgba(0,0,0,0.2) !important">--}}
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">
            @lang('labels.Painel')
        </a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item">
                <a href="{{ route('medicament.index') }}" class="nav-link">
                    <i class="fa fa-notes-medical mr-2"></i>
                    Medicamentos
                    <span class="badge badge-primary ml-1"> 34 </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-calendar mr-2"></i>Gerar Relatório
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('cio.index') }}" class="nav-link">
                    <i class="fa fa-venus-mars mr-2"></i>@lang('labels.cios')
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                             <img src="{{asset('users/' . current_user()->thumbnail)}}">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span
                                class="mb-0 text-sm  font-weight-bold">
                                @lang('labels.Hello')! {{ user_single_name() }}
                            </span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">@lang('labels.Wellcome')!</h6>
                    </div>
                    <a href="{{ route('profile.edit', auth()->user()->id) }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>@lang('labels.My') @lang('labels.profile')</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>@lang('labels.Suport')</span>
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
    </div>
</nav>