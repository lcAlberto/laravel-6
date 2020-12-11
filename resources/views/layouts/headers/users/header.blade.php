<div class="header pb-7 pt-2 pt-lg-7 d-flex align-items-center"
     style="background-size: 100%; background-position: center; background-repeat: no-repeat;
             background-image: url({{asset('/img/cards/users.jpg')}})">
    <span class="mask bg-gradient-purple opacity-5"></span>
    <!-- Layouts container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}">
                <h3 class="display-2 text-white"> @lang("labels.$title")</h3>
                <h7 class="text-white mt-0 mb-5">
                    <breadcrumb header="Usuarios" icon="fa fa-user">
                        <breadcrumb-item href="{{ route('home') }}">
                            <i class="mr-1 fa fa-home"></i>
                            @lang('headings._home')
                        </breadcrumb-item>
                    </breadcrumb>
                </h7>
            </div>
        </div>
    </div>
</div>
