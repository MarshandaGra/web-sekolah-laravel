@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">TAMBAH DATA GURU</h1>
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger h-3">
                            <strong>Whoops!</strong> ada kesalahan dalam memasukkan data<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ url('guru/create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nip"><strong>NIP</strong></label>
                            <input type="text" name="nip" class="form-control" placeholder="Masukan NIP" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_guru"><strong>Nama guru</strong></label>
                            <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru" required>
                        </div>
                        
                        <div class="text-left">
                            <a class="btn btn-danger" href="{{ route('guru.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection