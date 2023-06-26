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


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a style="color: #000" href="{{ route('movie.movies') }}">Ταινίες</a></li>
                <li class="breadcrumb-item active">Προσθήκη Ταινίας</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Προσθήκη Ταινίας</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-response" action="{{ route('movie.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="title">*Τίτλος Ταινίας</label>
                                        <input  type="text"  required id="title"  name="title" class="form-control"
                                                placeholder="Τίτλος Ταινίας" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="timetable">*Πρόγραμμα</label>
                                        <input  type="text" required id="timetable" name="timetable" class="form-control"
                                                placeholder="Πρόγραμμα" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="image">Σύνδεσμος Εικόνας</label>
                                        <input  type="text" id="image" name="image" class="form-control"
                                                placeholder="Σύνδεσμος Εικόνας" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="imdb_link">*Σύνδεσμος IMDB</label>
                                        <input  type="text" id="imdb_link" required name="imdb_link" class="form-control"
                                                placeholder="Σύνδεσμος IMDB" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="rotten_tomatoes_link">Σύνδεσμος Rotten Tomatoes</label>
                                        <input  type="text" id="rotten_tomatoes_link"  name="rotten_tomatoes_link" class="form-control"
                                                placeholder="Σύνδεσμος Rotten Tomatoes" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="imdb_code">Κωδικός IMDB</label>
                                        <input  type="text" id="imdb_code" name="imdb_code" readonly class="form-control"
                                                placeholder="Κωδικός IMDB" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="cinema_id">Κινηματογράφοι</label>
                                        <select name="cinema_id[]"  required id="cinema_id" aria-label="multiple" class="form-control" multiple>
                                            @foreach($cinemas as $cinema)
                                            <option value="{{$cinema->id}}" @if(count($cinemas) == 1) selected @endif>{{$cinema->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="date_start">Ξεκινάει να παίζεται</label>
                                        <input  type="date" id="date_start" name="date_start" class="form-control"
                                                placeholder="Ημερομηνία" />
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="description">Περιγραφή Ταινίας</label>
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-12 mx-auto mt-2">
                                    <div class="mb-1">
                                        <button type="submit" class="btn btn-secondary me-1">ΑΠΟΘΗΚΕΥΣΗ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
