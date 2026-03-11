<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Senjata;

class SenjataController extends Controller
{

    public function index()
    {
        $senjata = Senjata::all();
        return view('admin.dashboard', compact('senjata'));
    }

    public function create()
    {
        return view('admin.senjata.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_senjata' => 'required',
            'jenis' => 'required',
            'kaliber' => 'required',
            'negara_asal' => 'required',
            'tahun_produksi' => 'required|integer|min:1800|max:' . date('Y')
        ]);

        Senjata::create([
            'nama_senjata' => $request->nama_senjata,
            'jenis' => $request->jenis,
            'kaliber' => $request->kaliber,
            'negara_asal' => $request->negara_asal,
            'tahun_produksi' => $request->tahun_produksi
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $senjata = Senjata::findOrFail($id);
        return view('senjata.show', compact('senjata'));
    }

    public function edit($id)
    {
        $senjata = Senjata::findOrFail($id);
        return view('admin.senjata.edit', compact('senjata'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nama_senjata' => 'required',
            'jenis' => 'required',
            'kaliber' => 'required',
            'negara_asal' => 'required',
            'tahun_produksi' => 'required|integer|min:1800|max:' . date('Y')
        ]);

        $senjata = Senjata::findOrFail($id);

        $senjata->update([
            'nama_senjata' => $request->nama_senjata,
            'jenis' => $request->jenis,
            'kaliber' => $request->kaliber,
            'negara_asal' => $request->negara_asal,
            'tahun_produksi' => $request->tahun_produksi
        ]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $senjata = Senjata::findOrFail($id);
        $senjata->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Data berhasil dihapus');
    }
}
