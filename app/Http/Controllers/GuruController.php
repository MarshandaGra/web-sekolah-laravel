<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create ');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nip' => 'required|unique:guru,nip',
            'nama_guru' => 'required',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')
                        ->with('success', 'Data guru berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => "required|unique:guru,nip,$id",
            'nama_guru' => 'required',
        ]);
    
        $guru = Guru::findOrFail($id);
        if (!$guru) {
            return redirect()->route('guru.index')->with('error', 'Data tidak ditemukan.');
        }
    
        $guru->update($request->all());
    
        return redirect()->route('guru.index')
                        ->with('warning', 'Data guru berhasil diupdate');
    }
    public function destroy($id)
    {
        try {
            $guru = Guru::find($id);
            $guru->delete();
            return redirect()->route('guru.index')->with('danger', 'Data guru berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                // Integrity constraint violation
                return redirect()->route('guru.index')->with('error', 'Data tidak bisa dihapus karena berelasi dengan data lain.');
            } else {
                // Other database errors
                return redirect()->route('guru.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
