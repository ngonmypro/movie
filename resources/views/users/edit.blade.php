@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-body">
                    <H2>{{ __('Create') }}</H2>
                    <form method="POST" action="{{ action('UserController@update', $id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $User_Detail->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $User_Detail->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="hid_input_pass" style="display: none">
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-3">
                                <input id="status" type="radio" name="status" value="1" <?php if ($User_Detail->status == 1) { echo "checked"; }?>> ACTIVE
                                <br>
                                <input id="status" type="radio" name="status" value="0" <?php if ($User_Detail->status == 0) { echo "checked"; }?>> INACTIVE
                            </div>
                        </div>

                        <div class="form-group row" id="btn_change" style="display: block">
                            <div class="col-md-6 offset-md-4">
                                <a onclick="myFunction();" class="btn btn-outline-primary" >
                                    {{ __('Change Password') }}
                                </a>
                            </div>
                        </div>

                        <div class="form-group row mb-0" >
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ url('/user_manage') }}" class="btn btn-outline-dark">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.getElementById("hid_input_pass").style.display = "block";

    function myFunction() {
        var x = document.getElementById("hid_input_pass");
        var b = document.getElementById('btn_change');
        if (x.style.display === "none" && b.style.display === "block") {
            x.style.display = "block";
            b.style.display = "none";
        }
    }
</script>
