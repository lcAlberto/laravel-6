@extends('layouts.app')

@section('content')
    <layout-header
        background-img="{{asset('img/cards/user.jpg')}}"
        description="{{$description}}"
        title="@lang("labels.$title")"
        breadcrumb-header="Criar Fazenda"
        breadcrumb-label="@lang('headings._home')">
    </layout-header>
    <div class="container-fluid mt--7 card-procriare">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <div class="col-md-9 float-left">
                                    <h3>@lang('headings.users.create')</h3>
                                </div>
                                <div class="col-md-3 float-right">
                                    <a href="{{route('admin.user.index')}}" class="btn btn-block btn-primary">
                                        <i class="fa fa-arrow-left mr-2"></i>Voltar
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="col-12">
{{--                                        @include('layouts.flash-message')--}}
                                    </div>

                                    <div class="d-flex flex-column align-items-center">
                                        <div class="col-12">
                                            <form class="form-horizontal p-0" method="POST" action="{{ route('admin.user.store') }}">
                                                @csrf
                                                <user-form
                                                :old='@json(old())'
                                                :errors="{{$errors}}">
                                                </user-form>
{{--                                                <register-form--}}
{{--                                                    :old='@json(old())'--}}
{{--                                                    :errors="{{$errors}}">--}}
{{--                                                </register-form>--}}
                                                <div class="form-group col-sm-12 col-md-6">
                                                    <button class="btn btn-block btn-primary" type="submit">
                                                        <i class="fa fa-check"></i> @lang('links._create')
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.footers.auth')
            </div>
        </div>
    </div>
@endsection