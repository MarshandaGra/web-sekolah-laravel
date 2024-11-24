<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelajarans = Pelajaran::with('kelas','guru')->get();
        return view('pelajaran.index', compact('pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $guru = Guru::all();
        return view('pelajaran.create', compact('kelas','guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'guru_id' => 'required|exists:guru,id',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        Pelajaran::create($request->all());

        return redirect()->route('pelajaran.index')
                        ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelajarans = Pelajaran::with('kelas','guru')->findOrFail($id);
        return view('pelajaran.show', compact('pelajarans'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $kelas = Kelas::all();
        $guru = Guru::all();
        return view('pelajaran.edit', compact('pelajaran', 'kelas','guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required',
            'guru_id' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->update($request->all());

        return redirect()->route('pelajaran.index')
                        ->with('warning', 'Data mata pelajaran berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->delete();

        return redirect()->route('pelajaran.index')
                        ->with('danger', 'Data mata pelajaran berhasil dihapus.');
    }
}
