@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">TAMBAH DATA MATA PELAJARAN</h1>
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
                    <form action="{{ url('pelajaran/create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kelas_id"><strong>Mata Pelajaran</strong></label>
                            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" placeholder="Mata Pelajaran" required>
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
                        <div class="form-group">
                            <label for="kelas_id"><strong>Kelas</strong></label>
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                <option value="" selected disabled>Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" data-guru-id="{{ $k->guru_id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-left">
                            <a class="btn btn-danger" href="{{ route('pelajaran.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection