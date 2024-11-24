<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('kelas')->get();
        return view('absensi.index', compact('absensis'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('absensi.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required',
            'nama_siswa' => 'required',
            'keterangan' => 'required|in:Hadir,Ijin,Sakit,Alpha',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')
                        ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    public function show(Absensi $absensi)
    {
        return view('absensi.show', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $kelas = Kelas::all();
        return view('absensi.edit', compact('absensi', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
            'nama_siswa' => 'required',
            'keterangan' => 'required|in:Hadir,Ijin,Sakit,Alpha',
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')
                        ->with('warning', 'Data absensi berhasil diupdate');
    }

    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')
                        ->with('danger', 'Data absensi berhasil dihapus');
    }
}
