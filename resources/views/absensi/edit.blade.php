@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">EDIT DATA ABSENSI </h1>
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> ada kesalahan dalam memasukkan data<br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Nama Siswa</strong></label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $absensi->nama_siswa) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id"><strong>Kelas</strong></label>
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                <option value="" disabled selected>Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $absensi->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Keterangan</strong><br>
                            <label2><input type="radio" name="keterangan" value="Hadir" {{ $absensi->keterangan == 'Hadir' ? 'checked' : '' }} required> Hadir</label2>
                            <label2><input type="radio" name="keterangan" value="Ijin" {{ $absensi->keterangan == 'Ijin' ? 'checked' : '' }} required> Ijin</label2>
                            <label2><input type="radio" name="keterangan" value="Sakit" {{ $absensi->keterangan == 'Sakit' ? 'checked' : '' }} required> Sakit</label2>
                            <label2><input type="radio" name="keterangan" value="Alpha" {{ $absensi->keterangan == 'Alpha' ? 'checked' : '' }} required> Alpha</label2>
                        </div>
                        <div class="text-left">
                            <a class="btn btn-danger" href="{{ route('absensi.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
