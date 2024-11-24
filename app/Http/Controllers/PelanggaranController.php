<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use App\Models\DetailPelanggaran;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggarans = Pelanggaran::with('siswa','kelas', 'detailPelanggaran')->get();
        return view('pelanggaran.index', compact('pelanggarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    // {
    //     $kelas = Kelas::all();
    //     $detailPelanggarans = DetailPelanggaran::all();
    //     return view('pelanggaran.create', compact('kelas', 'detailPelanggarans'));
    // }
    {
        $detailPelanggarans = DetailPelanggaran::all();
        $kelas = Kelas::all();
        $siswa = Absensi::all();
        return view('pelanggaran.create', compact('detailPelanggarans', 'kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'detail_pelanggaran_id' => 'required',
            'nama_siswa' => 'required',
        ]);

        Pelanggaran::create($request->all());

        return redirect()->route('pelanggaran.index')
                        ->with('success','Data pelanggaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggaran = Pelanggaran::with('kelas', 'detailPelanggaran')->findOrFail($id);
        return view('pelanggaran.show', compact('pelanggaran'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $kelas = Kelas::all();
        $detailPelanggarans = DetailPelanggaran::all();
        return view('pelanggaran.edit', compact('pelanggaran', 'kelas', 'detailPelanggarans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
            'detail_pelanggaran_id' => 'required',
            'nama_siswa' => 'required',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->update($request->all());

        return redirect()->route('pelanggaran.index')
                        ->with('warning', 'Data pelanggaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $pelanggaran->delete();

        return redirect()->route('pelanggaran.index')
                        ->with('danger', 'Data pelanggaran berhasil dihapus.');
    }
}
