<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Senjata;

class SenjataController extends Controller
{

    public function index()
    {
        $data = Senjata::all();
        return view('admin.senjata.index', compact('data'));
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

        return redirect()->route('senjata.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $data = Senjata::findOrFail($id);
        return view('senjata.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Senjata::findOrFail($id);
        return view('admin.senjata.edit', compact('data'));
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

        $data = Senjata::findOrFail($id);

        $data->update([
            'nama_senjata' => $request->nama_senjata,
            'jenis' => $request->jenis,
            'kaliber' => $request->kaliber,
            'negara_asal' => $request->negara_asal,
            'tahun_produksi' => $request->tahun_produksi
        ]);

        return redirect()->route('senjata.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = Senjata::findOrFail($id);
        $data->delete();

        return redirect()->route('senjata.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
