@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')
    <div class="container mt--9 pb-3">
        <!-- Table -->
        <div class="row justify-content-end">
            <div class="col-lg-5 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-3">
                        <div class="text-center mb-4">
{{--                            <small>@lang('labels.Or sign up with credentials')</small>--}}
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data"
                              action="{{ route('register') }}">
                            @csrf
                            <register-form
                                :old='@json(old())'
                                :errors="{{$errors}}">
                            </register-form>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection