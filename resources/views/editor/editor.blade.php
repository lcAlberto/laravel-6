@extends('layouts.app')

@section('content')
{{--    <layout-header--}}
{{--        background-img="{{asset('img/cards/editor2.jpg')}}"--}}
{{--        description="{{$description}}"--}}
{{--        title="@lang("labels.$title")"--}}
{{--        breadcrumb-header="Criar Fazenda"--}}
{{--        breadcrumb-label="@lang('headings._home')">--}}
{{--    </layout-header>--}}
    <div class="container-fluid mt-7 index-card-editor">
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
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="table table-responsive">
                                            <editor-area></editor-area>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--                @include('layouts.footers.auth')--}}
            </div>
        </div>
    </div>
@endsection