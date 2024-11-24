@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-3 text-uppercase text-center fw-bold">EDIT DATA PELANGGARAN</h1>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('pelanggaran.update', $pelanggaran->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Nama Siswa</strong></label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $pelanggaran->nama_siswa) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id"><strong>Jenis Pelanggaran</strong></label>
                            <select class="form-control" id="detail_pelanggaran_id" name="detail_pelanggaran_id" required>
                                <option value="" disabled>Pilih Pelanggaran</option>
                                @foreach($detailPelanggarans as $dp)
                                    <option value="{{ $dp->id }}" {{ $pelanggaran->detail_pelanggaran_id == $dp->id ? 'selected' : '' }}>{{ $dp->nama_pelanggaran }} (Poin: {{ $dp->poin }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id"><strong>Kelas</strong></label>
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                <option value="" disabled>Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $pelanggaran->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }} (Wali Kelas: {{ $k->wali_kelas }})</option>
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
