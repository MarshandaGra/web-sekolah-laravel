<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */
    public function index()
    {
        $kelas = Kelas::with('guru')->get();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'guru_id' => 'required',
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
                        ->with('success', 'Data kelas berhasil ditambahkan.');
    
    }


    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('kelas.edit', compact('kelas','guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $id,
            'guru_id' => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')
                        ->with('warning', 'Data kelas berhasil diupdate');
    }
    public function destroy($id)
    {
        // $kelas = Kelas::find($id);
        // $kelas->delete();

        // return redirect()->route('kelas.index')
        //                 ->with('danger', 'Data kelas berhasil dihapus.');

        try {
            $kelas = Kelas::findOrFail($id);
            $kelas->delete();
            return redirect()->route('kelas.index')->with('danger', 'Data kelas berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                // Integrity constraint violation
                return redirect()->route('kelas.index')->with('error', 'Data tidak bisa dihapus karena berelasi dengan data lain.');
            } else {
                // Other database errors
                return redirect()->route('kelas.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        }
    }
}
