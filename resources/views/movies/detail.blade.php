@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $Movie_Detail->name }}</div>

                    <div class="card-body">
                        <div class="group" align="center">
                            @foreach ($Image_List as $key => $Images)
                                <img class="d-block h-100" src="/images/{{ $Images->name }}">
                            @endforeach
                            <br>
                            <div class="row justify-content-center">
                                {{ $Image_List->links() }}
                            </div>
                        </div>
                        <div class="group">
                            <b>
                                Rating :
                            </b>
                            @for ($i = 0; $i < 5; $i++)
                                @if (floor($Rating) - $i >= 1)
                                    {{--Full Start--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                @elseif ($Rating - $i > 0)
                                    {{--Half Start--}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half text-warning" viewBox="0 0 16 16">
                                        <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <div class="group">
                            <b>Entry date : </b>{{ Str::limit($Movie_Detail->date_in, 10, '') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Comment') }}</div>
                    @php
                        $num_row = 0;
                    @endphp
                    @guest
                        <div class="card-body">
                            <div class="form-group">
                                @foreach ($Review as $key => $Review_row)
                                    <div class="form-group row">
                                        <div class="col-md-2 col-form-label text-md-right"></div>

                                        <div class="row col-md-8">
                                            @for ($i = 0; $i < 5; $i++)
                                            @if (floor($Review_row->point) - $i >= 1)
                                                {{--Full Start--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            @elseif ($Review_row->point - $i > 0)
                                                {{--Half Start--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half text-warning" viewBox="0 0 16 16">
                                                    <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                        </div>
                                    </div>
                                    @if (!is_null($Review_row->comment))
                                        <div class="form-group row">
                                            <div class="col-md-2 col-form-label text-md-right"></div>

                                            <div class="col-md-8">
                                                {{ __($Review_row->comment) }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-md-2 col-form-label text-md-right"></div>

                                        <div class="col-md-8">
                                            {{ $Review_row->created_at }}
                                        </div>
                                    </div>
                                    @php
                                        $num_row += 1;
                                    @endphp
                                    @if ($num_row == count($Review))
                                    @else
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="form-group">
                                @foreach ($Review as $key => $Review_row)
                                    <div class="form-group row">
                                        <div class="col-md-2 col-form-label text-md-right"></div>

                                        <div class="row col-md-8">
                                            @for ($i = 0; $i < 5; $i++)
                                            @if (floor($Review_row->point) - $i >= 1)
                                                {{--Full Start--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                </svg>
                                            @elseif ($Review_row->point - $i > 0)
                                                {{--Half Start--}}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half text-warning" viewBox="0 0 16 16">
                                                    <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star text-warning" viewBox="0 0 16 16">
                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                        </div>
                                    </div>
                                    @if (!is_null($Review_row->comment))
                                        <div class="form-group row">
                                            <div class="col-md-2 col-form-label text-md-right"></div>

                                            <div class="col-md-8">
                                                {{ __($Review_row->comment) }}
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-md-2 col-form-label text-md-right"></div>

                                        <div class="col-md-8">
                                            {{ $Review_row->created_at }}
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>

                            {{-- Comment --}}
                            <form method="post" action="{{ URL::to('review/comment') }}">
                                @csrf
                                <input type="hidden" name="movie" value="{{ $Movie_Detail->id }}">
                                <div class="form-group row">
                                    <label for="comment" class="col-md-3 col-form-label text-md-right">{{ __('Comment') }}</label>

                                    <div class="col-md-8">
                                        <textarea id="comment" type="text" class="form-control" name="comment" value="">
                                            {{ old('comment') }}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rating" class="col-md-3 col-form-label text-md-right">{{ __('Rating') }}</label>

                                    <div class="col-md-8">
                                        <input type="radio" name="rating" id="rating" value="1"> 1
                                        <input type="radio" name="rating" id="rating" value="2"> 2
                                        <input type="radio" name="rating" id="rating" value="3"> 3
                                        <input type="radio" name="rating" id="rating" value="4"> 4
                                        <input type="radio" name="rating" id="rating" value="5"> 5
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rating" class="col-md-3 col-form-label text-md-right"></label>

                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-outline-success">Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endguest

                </div>
                <br>
                    @guest
                        <a href="{{ url('/') }}" class="btn btn-outline-dark">
                            {{ __('Back') }}
                        </a>
                    @else
                        <a href="{{ url('/movie_manage') }}" class="btn btn-outline-dark">
                            {{ __('Backel') }}
                        </a>
                    @endguest
            </div>
        </div>
        <br>
    </div>
@endsection

<script>
</script>
