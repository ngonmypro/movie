@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card-body">
                    <h2>Edit</h2>
                    <form method="POST" action="{{ action('MovieController@update', $id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$Movie_Detail->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="img" type="file" name="img" value="{{ old('img') }}" required autocomplete="img" accept="image/*">

                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="date_in" class="col-md-4 col-form-label text-md-right">{{ __('Date In') }}</label>

                            <div class="col-md-6">
                                <input id="date_in" type="date" class="form-control" name="date_in" required value="{{ Str::limit($Movie_Detail->date_in, 10, '') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_out" class="col-md-4 col-form-label text-md-right">{{ __('Date Out') }}</label>

                            <div class="col-md-6">
                                <input id="date_out" type="date" class="form-control" name="date_out" required value="{{ Str::limit($Movie_Detail->date_out, 10, '') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-3">
                                <input id="status" type="radio" name="status" value="1" <?php if ($Movie_Detail->status == 1) { echo "checked"; }?>> ACTIVE
                                <br>
                                <input id="status" type="radio" name="status" value="0" <?php if ($Movie_Detail->status == 0) { echo "checked"; }?>> INACTIVE
                            </div>
                        </div>

                        <div class="form-group row mb-0" >
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-success">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ url('/movie_manage') }}" class="btn btn-outline-dark">
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
