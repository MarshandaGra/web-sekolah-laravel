@extends('layouts.app')

@section('content')
    <div class="pull-left">
        <h1 class="mb-4 mt-4 text-uppercase text-center fw-bold">DATA ABSENSI</h1>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row ">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">
                            <a href="{{ route('absensi.create') }}" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambahkan Data</span></a>		
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success size-1">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('danger'))
                    <div class="alert alert-danger size-1">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning size-1">
                        <p>{{ $message }}</p>
                    </div>
                @endif

        <table class="table table-bordered">
            <tr>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            @foreach ($absensis as $absensi)
                    <tr>
                        <td>{{ $absensi->nama_siswa }}</td>
                        <td>{{ $absensi->kelas->nama_kelas }}</td>
                        <td>{{ $absensi->keterangan }}</td>
                        <td>
                            <div class="action-icons">
                                <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-warning btn-sm">
                                    <i class="material-icons" data-toggle="tooltip" title="Update">&#xE254;</i>
                                </a>
                                <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
