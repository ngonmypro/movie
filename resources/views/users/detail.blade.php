@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-body">
                    <H2>{{ __('Detail') }}</H2>
                    {{-- <form method="POST" action="{{ url('/user_manage') }}" enctype="multipart/form-data"> --}}
                        {{-- @csrf --}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $User_Detail->name }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $User_Detail->email }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row mb-0" >
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url('/user_manage') }}" class="btn btn-outline-dark">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
