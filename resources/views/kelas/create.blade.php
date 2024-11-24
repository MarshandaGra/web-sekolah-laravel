@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">TAMBAH DATA KELAS</h1>
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
                    <form action="{{ url('kelas/create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Nama Kelas</strong></label>
                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required>
                        </div>
                        <div class="form-group">
                            <label for="guru_id"><strong>Nama Guru</strong></label>
                            <select class="form-control" id="guru_id" name="guru_id" required>
                                <option value="" selected disabled>Pilih Guru</option>
                                @foreach($guru as $g)
                                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-left">
                            <a class="btn btn-danger" href="{{ route('kelas.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection