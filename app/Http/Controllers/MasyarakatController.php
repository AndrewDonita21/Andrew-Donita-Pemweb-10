<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use app\Models\keluhan;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::orderBy('nama')->paginate(10);
        return view('masyarakat.index', compact('masyarakat'));
    }

    public function create()
    {
        return view('masyarakat.create');
    }

    public function show(Masyarakat $masyarakat)
    {
        $masyarakat = Masyarakat::with('keluhans')->where('id, $masyarakat_id')->first();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kk'      => 'required|digits:16',
            'nik'           => 'required|digits:16|unique:masyarakats',
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        Masyarakat::create($request->all());
        return redirect()->route('masyarakat.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit(Masyarakat $masyarakat)
    {
        return view('masyarakat.edit', compact('masyarakat'));
    }

    public function update(Request $request, Masyarakat $masyarakat)
    {
        $request->validate([
            'nomor_kk'      => 'required|digits:16',
            'nik'           => 'required|digits:16|unique:masyarakats,nik,' . $masyarakat->id,
            'nama'          => 'required|string|max:255',
            'alamat'        => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        ]);

        $masyarakat->update($request->all());
        return redirect()->route('masyarakat.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat->delete();
        return redirect()->route('masyarakat.index')->with('success', 'Data berhasil dihapus!');
    }
}