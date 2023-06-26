@extends('layouts.app-master')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{session('success')}}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <caption>Λίστα Κινηματογράφων</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Όνομα</th>
                    <th scope="col">Διεύθυνση</th>
                    <th scope="col">Τηλέφωνο</th>
                    <th scope="col">Ιστοσελίδα</th>
                    <th scope="col">Επιλογές</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($userCinemas as $key => $cinema)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td> {{ $cinema->name }}</td>
                        <td>{{ $cinema->address }}</td>
                        <td>{{ $cinema->telephone }}</td>
                        <td> <a href="{{ $cinema->webpage }}" target="_blank">{{ $cinema->webpage }} </a></td>
                        <td style="display: flex"> <a href="{{ route('cinema.edit', ['cinema' => $cinema]) }}" class="btn btn-success mx-1"><i class="fas fa-edit"></i></a>
                            <form method="POST" id="delete-form" action="{{route('cinema.destroy', ['cinema' => $cinema])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?');"  class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
