<?php

namespace App\Http\Controllers;

use App\Models\DetailPelanggaran;
use Illuminate\Http\Request;

class DetailPelanggaranController extends Controller
{
    public function index()
    {
        $detailpelanggaran = DetailPelanggaran::all();
        return view('detailpelanggaran.index', compact('detailpelanggaran'));
    }

    public function create()
    {
        return view('detailpelanggaran.create ');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nama_pelanggaran' => 'required|unique:detail_pelanggaran,nama_pelanggaran',
            'poin' => 'required|integer|min:1',
        ]);

        DetailPelanggaran::create($request->all());

        return redirect()->route('detailpelanggaran.index')
                        ->with('success', 'Data detail pelanggaran berhasil ditambahkan.');
    
    }


    public function edit($id)
    {
        $detailpelanggaran = DetailPelanggaran::find($id);
        if (!$detailpelanggaran) {
            return redirect()->route('detailpelanggaran.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('detailpelanggaran.edit', compact('detailpelanggaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggaran' => 'required|unique:detail_pelanggaran,nama_pelanggaran,' . $id,
            'poin' => 'required|integer|min:1',
        ]);

        $detailpelanggaran = DetailPelanggaran::find($id);
        if (!$detailpelanggaran) {
            return redirect()->route('detailpelanggaran.index')->with('error', 'Data tidak ditemukan.');
        }

        $detailpelanggaran->update($request->all());

        return redirect()->route('detailpelanggaran.index')
                        ->with('warning', 'Data detail pelanggaran berhasil di update');
    }

    public function destroy($id)
    {
        try {
            $detailpelanggaran = DetailPelanggaran::find($id);
            $detailpelanggaran->delete();
            return redirect()->route('detailpelanggaran.index')->with('danger', 'Data detail pelanggaran berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                // Integrity constraint violation
                return redirect()->route('detailpelanggaran.index')->with('error', 'Data tidak bisa dihapus karena berelasi dengan data lain.');
            } else {
                // Other database errors
                return redirect()->route('detailpelanggaran.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }

}
