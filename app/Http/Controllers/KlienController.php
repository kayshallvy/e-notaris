<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function index()
    {
        $kliens = Klien::all();
        return view('klien.index', compact('kliens'));
    }

    public function create()
    {
        return view('klien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Klien::create($request->all());

        return redirect()->route('klien.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function edit(Klien $klien)
    {
        return view('klien.edit', compact('klien'));
    }

    public function update(Request $request, Klien $klien)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $klien->update($request->all());

        return redirect()->route('klien.index')->with('success', 'Klien berhasil diperbarui.');
    }

    public function destroy(Klien $klien)
    {
        $klien->delete();

        return redirect()->route('klien.index')->with('success', 'Klien berhasil dihapus.');
    }
}
