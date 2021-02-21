@extends('layouts.app')

@section('content')
    <layout-header
        background-img="{{asset('img/cards/user.jpg')}}"
        description="{{$description ?? ''}}"
        title="@lang("labels.$title")"
        breadcrumb-header="Criar Fazenda"
        breadcrumb-label="@lang('headings._home')">
    </layout-header>
    <div class="container-fluid mt--9 card-procriare">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <user-thumbnail-form
                    :old='@json(old())'
                    :errors="{{$errors}}"
                    :data="{{current_user()}}"
                    farm="{{current_user()->farm->name}}"
                    :role="true"
                    imgUrl="{{asset('users/' . current_user()->thumbnail)}}">
                </user-thumbnail-form>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{current_user()->name }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update', current_user()->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">Dados Pessoais</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <user-data-form
                                :old='@json(old())'
                                :errors="{{$errors}}"
                                :data="{{current_user()}}">
                            </user-data-form>

                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <user-password-form
                                :old='@json(old())'
                                :errors="{{$errors}}"
                                :data="{{current_user()}}">
                            </user-password-form>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection