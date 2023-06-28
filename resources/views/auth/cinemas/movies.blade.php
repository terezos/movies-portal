@extends('layouts.app-master')
@section('content')
    <div class="container">

        @if(session('success'))
            <div class="alert alert-success"><i class="fa fa-exclamation-circle"></i>
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif

        @if(session('delete'))
            <div class="alert alert-success"><i class="fa fa-exclamation-circle"></i>
                {{session('delete')}}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif

        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                </div>
                @if(!empty($cinemasToReturn))
                <div class="col-sm-6 text-end pb-1">
                    <a href="{{ route('movie.create')}}" class="btn btn-secondary" ><i class="fa fa-plus" aria-hidden="true"></i> <span>Προσθήκη Ταινίας</span></a>
                </div>
                @else
                <div class="col-sm-12">
                    <h4>
                        Δεν υπάρχουν Διαθέσιμοι Κινηματογράφοι
                    </h4>
                    <a href="{{ route('cinema.create')}}" class="btn btn-secondary" ><i class="fa fa-plus" aria-hidden="true"></i> <span>Προσθήκη Κινηματογράφου</span></a>
                </div>
                @endif
            </div>
        </div>


        @foreach($cinemasToReturn as $cinema)
            @if(!empty($moviePerCinema))
            <div class="table-responsive">
                <table class="table">
                    <h2><b>{{$cinema->name}}</b></h2>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Τίτλος</th>
                        <th scope="col">Πρόγραμμα</th>
                        <th scope="col">Επιλογές</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($moviePerCinema[$cinema->id] as $key => $movie)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td> {{ $movie->title }}</td>
                                <td>{{ $movie->timetable }}</td>
                                <td style="display: flex"><a href="{{ route('movie.edit', ['movie' => $movie]) }}"
                                                             class="btn btn-success mx-1"><i
                                            class="fas fa-edit"></i></a>
                                    <form method="POST" id="delete-form"
                                          action="{{route('movie.destroy', ['movie' => $movie])}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?');"
                                                class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

                @endif
        @endforeach

    </div>



@endsection
