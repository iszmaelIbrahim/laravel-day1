@extends('layouts.base')

@section('content')

<div class="container pb-5">



    <div class="row pt-4">
        <div class="col">
            <h3> Tambah Anime </h3>

            <form method="POST" action="/animes">
                @csrf

                Nama Anime: <input type="text" name="nama"> <br><br>
                Episod: <input type="number" name="episod"><br><br>
                Tahun: <input type="number" name="tahun"><br><br>

                <input type="hidden" name="studio_id" value=1>

                <button class="btn btn-primary" type="submit">Submit</button>
            </form>

        </div>
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <h3>Senarai Anime</h3>
                </div>
                <div class="card-body">

                    <ul>

                        @foreach ($animes as $anime)
                        <li>Name Anime: {{$anime->nama}}, Episod: {{$anime->episod}}, Tahun: {{$anime->tahun}}</li>
                        <!-- <button class="btn btn-primary" type="button">Comment</button> -->

                        @endforeach
                    </ul>
                </div>
            </div>


        </div>

    </div>

    <br>
    <hr>

    <div class="container mt-5">
        <form action="/fails" method="post" enctype="multipart/form-data">
            <h3 class="mb-4">Simpan Fail</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="custom-file col-6">
                <input type="file" name="file" class="form-control" id="chooseFile">
                <!-- <label class="custom-file-label" for="chooseFile">Pilih Fail</label> -->
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Hantar Fail
            </button>
        </form>
    </div>

    <hr>
    <br>

    <div class="card">
        <div class="card-header">
            <h3> Data Daripada API</h3>
        </div>
        <div class="card-body">
            <!-- <h3>Data From API</h3> -->

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Height</th>
                        <th>Mass</th>
                        <th>Hair Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apiData as $data)
                    <tr>
                        <td>{{ $data['name'] }}</td>
                        <td>{{ $data['gender'] }}</td>
                        <td>{{ $data['height'] }}</td>
                        <td>{{ $data['mass'] }}</td>
                        <td>{{ $data['hair_color'] }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>

@stop