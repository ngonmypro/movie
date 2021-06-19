@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-1">

            </div>
            <div class="col-md-3">
                <a href="{{ route('user_manage.create') }}" class="btn btn-outline-success">
                    {{ __('Add Movie') }}
                </a>
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            {{-- Table --}}
            <div class="col-md-10">
                <table>
                    <thead>
                        <th style="width: 10%">No.</th>
                        <th>Name</th>
                        <th style="width: 15%">Email</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 25%">Manage</th>
                    </thead>
                    <tbody>
                        @php
                            $num_row = 1;
                        @endphp
                        @foreach ($User_List as $row)
                            <tr>
                                <td style="text-align: center;">{{ $num_row  }}</td>
                                <td>{{ $row->name }}</td>
                                <td style="text-align: center;">{{ $row->email }}</td>
                                @if ( $row->status == 1)
                                    <td style="text-align: center; color: green;">ACTIVE</td>
                                @else
                                    <td style="text-align: center; color: red;">INACTIVE</td>
                                @endif
                                <td style="text-align: center;">
                                    <a href="{{ route('user_manage.show', $row->id) }}" class="btn btn-outline-info">
                                        {{ __('Detail') }}
                                    </a>
                                    <a href="{{ route('user_manage.edit', $row->id) }}" class="btn btn-outline-secondary">
                                        {{ __('Edit') }}
                                    </a>
                                    @if (Auth::user()->id != $row->id)
                                        <form action="{{ route('user_manage.destroy', $row->id) }}" method="post">
                                            <input type="hidden" name="_method" value="DELETE">
                                                @csrf
                                            <button id="btnDelete" class="btn btn-outline-danger">{{ __('Delete') }}</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @php
                                $num_row += 1;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="row justify-content-center">
                    {{ $User_List->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.onsubmit=function(){
        return confirm('Are you sure to delete this User?');
    }
</script>
