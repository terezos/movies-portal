@extends('layouts.app-master')
@section('content')
    <div class="container">
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
                        <td> Επεξεργασία </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
