@extends('layouts.app')

@section('content')
    <div class="pull-left">
        <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">DATA PELANGGARAN</h1>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row ">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <a href="{{ route('detailpelanggaran.create') }}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambahkan Data</span></a>		
                        </div>
                    </div>
                </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Nama Pelanggaran</th>
                <th>Poin</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            @foreach ($detailpelanggaran as $detailpelanggaran)
                    <tr>
                        <td>{{ $detailpelanggaran->nama_pelanggaran }}</td>
                        <td>{{ $detailpelanggaran->poin }}</td>
                        <td>
                            @if ($detailpelanggaran->poin <= 50)
                                <span class="badge bg-success">Ringan</span>
                            @elseif ($detailpelanggaran->poin < 150)
                                <span class="badge bg-warning">Sedang</span>
                            @else
                                <span class="badge bg-danger">Berat</span>
                            @endif
                        </td>
                        <td>
                            <div class="action-icons">
                                <a href="{{ route('detailpelanggaran.edit', $detailpelanggaran->id) }}" class="btn btn-warning btn-sm">
                                    <i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i>
                                </a>
                                <form action="{{ route('detailpelanggaran.destroy', $detailpelanggaran->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete">
                                        <i class="material-icons">&#xE872;</i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
