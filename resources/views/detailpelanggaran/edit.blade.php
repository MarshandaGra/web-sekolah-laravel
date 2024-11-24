@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">EDIT DATA PELANGGARAN</h1>
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
                    <form action="{{ route('detailpelanggaran.update', $detailpelanggaran->id) }}" method="POST" onsubmit="return validateForm()">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Nama Pelanggaran</strong></label>
                            <input type="text" name="nama_pelanggaran" class="form-control" placeholder="Nama Pelanggaran" value="{{ $detailpelanggaran->nama_pelanggaran }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa"><strong>Poin</strong></label>
                            <input type="text" name="poin" class="form-control" placeholder="Poin" value="{{ $detailpelanggaran->poin }}" required>
                        </div>
                        <div class="text-left">
                            <a class="btn btn-danger" href="{{ route('detailpelanggaran.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        var poin = document.getElementById('poin').value;
        if (poin <= 0) {
            alert("Poin tidak boleh 0 atau bilangan negatif.");
            return false;
        }
        return true;
    }
</script>
@endsection
