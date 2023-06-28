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
                <li class="breadcrumb-item"><a style="color: #000" href="{{ route('cinema.cinemas') }}">Κινηματογράφοι</a></li>
                <li class="breadcrumb-item active">Προσθήκη Κινηματογράφου</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Προσθήκη Κινηματογράφου</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-response" action="{{ route('cinema.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{auth()->user()->id }}">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="name">*Όνομα Κινηματογράφου</label>
                                        <input  type="text"  required id="name"  name="name" class="form-control"
                                                placeholder="Όνομα Κινηματογράφου" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="address">*Διεύθυνση</label>
                                        <input  type="text" id="address" required name="address" class="form-control"
                                                placeholder="Διεύθυνση" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="telephone">*Τηλέφωνο</label>
                                        <input  type="text" id="telephone" required name="telephone" class="form-control"
                                                placeholder="Τηλέφωνο" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="image">Φωτογραφία</label>
                                        <input  type="text" id="image"  name="image" class="form-control"
                                                placeholder="Φωτογραφία" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="webpage">Ιστοσελίδα</label>
                                        <input  type="text" id="webpage" name="webpage" class="form-control"
                                                placeholder="Ιστοσελίδα" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="summer">Θερινό</label>
                                        <select name="summer" id="summer" class="form-control">
                                            <option value="1">ΝΑΙ</option>
                                            <option value="0" selected>ΟΧΙ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="description">Περιγραφή</label>
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
