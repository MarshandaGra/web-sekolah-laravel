@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">TAMBAH DATA PELANGGARAN SISWA</h1>
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
                    <form action="{{ url('pelanggaran/create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kelas_id"><strong>Nama Siswa</strong></label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="masukkan nama siswa" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Jenis Pelanggaran</strong></label>
                            <select class="form-control" id="detail_pelanggaran_id" name="detail_pelanggaran_id" required>
                                <option value="" selected disabled>pilih pelanggaran </option>
                                @foreach($detailPelanggarans as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->nama_pelanggaran }} (Poin: {{ $dp->poin }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Kelas</strong></label>
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                <option value="" selected disabled>pilih kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <div class="text-left">
                            <a class="btn btn-danger" href="{{ route('pelanggaran.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection