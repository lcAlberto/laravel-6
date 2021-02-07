@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    <layout-header
        background-img="{{asset('img/cards/user.jpg')}}"
        description="Gerencie seus colaboradores"
        title="@lang("labels.$title")"
        breadcrumb-header="Usuarios"
        breadcrumb-label="@lang('headings._home')">
    </layout-header>
    <div class="container-fluid mt--7 index-card-procriare">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-sm-12">
                                <h3 class="mb-0">@lang('labels.Users')</h3>
                            </div>
                            <div class="col-lg-6 col-12 m-sm-2">
                                <form action="#" method="post" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <filter-text
                                            url-key="query"
                                            class="col-12 form-control"
                                            placeholder="@lang('labels.Search')...">
                                        </filter-text>
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <i class="fa fa-search"></i>
                                                    </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-3 col-sm-12 float-right">
                                @if($title == 'search')
                                    <a href="{{ URL::previous() }}" class="btn btn-danger btn-block right-0">
                                        <i class="fa fa-arrow-left"></i>@lang('labels.Back')</a>
                                @endif
                                @if($title == 'User Management')
                                    <a href="{{ route('admin.user.create') }}"
                                       class="btn btn-primary btn-block right-0">
                                        <i class="fa fa-plus mr-2"></i>@lang('labels.Add User')</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Farms table -->
                    <div class="card">
                        <div class="table-responsive d-flex">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>Email</td>
                                    <td>Telefone</td>
                                    <td>Criado em</td>
                                    <td></td>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->thumbnail}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <div class="btn-group-sm">
                                                <a class="btn btn-white" href="#">
                                                    <i class="fa fa-pencil-alt text-success"></i>
                                                </a>
                                                <a class="btn btn-white" href="#">
                                                    <i class="fa fa-eye text-primary"></i>
                                                </a>
                                                <a class="btn btn-white" href="#">
                                                    <i class="fa fa-eraser text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="card-footer py-4 mt-8">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection