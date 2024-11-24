@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">EDIT DATA MATA PELAJARAN</h1>
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
                    <form action="{{ route('pelajaran.update', $pelajaran->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Mata Pelajaran</strong></label>
                            <input type="text" class="form-control" placeholder="Mata Pelajaran" id="mata_pelajaran" name="mata_pelajaran" value="{{ old('mata_pelajaran', $pelajaran->mata_pelajaran) }}" required>
                        </div>
                        <div class="form-group">
                            <label for="guru_id"><strong>Nama Guru</strong></label>
                            <select class="form-control" id="guru_id" name="guru_id" required>
                                @foreach($guru as $g)
                                    <option value="{{ $g->id }}" {{ $pelajaran->guru_id == $g->id ? 'selected' : '' }}>{{ $g->nama_guru }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id"><strong>Kelas</strong></label>
                            <select class="form-control" id="kelas_id" name="kelas_id" required>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}" {{ $pelajaran->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
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
