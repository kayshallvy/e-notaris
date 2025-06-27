<?php

namespace App\Http\Controllers;

use App\Models\Akta;
use App\Models\Klien;
use App\Models\AktaKlien;
use Illuminate\Http\Request;

class AktaKlienController extends Controller
{
    public function index()
    {
        $aktaKliens = AktaKlien::with(['akta', 'klien'])->get();
        return view('akta_klien.index', compact('aktaKliens'));
    }

    public function create()
    {
        $aktas = Akta::all();
        $kliens = Klien::all();
        return view('akta_klien.create', compact('aktas', 'kliens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_akta' => 'required|exists:aktas,id_akta',
            'id_klien' => 'required|exists:kliens,id_klien',
            'peran' => 'required|string|max:50',
        ]);

        AktaKlien::create($request->all());

        return redirect()->route('akta-klien.index')->with('success', 'Relasi klien-akta berhasil disimpan.');
    }

    public function edit(AktaKlien $aktaKlien)
    {
        $aktas = Akta::all();
        $kliens = Klien::all();
        return view('akta_klien.edit', compact('aktaKlien', 'aktas', 'kliens'));
    }

    public function update(Request $request, AktaKlien $aktaKlien)
    {
        $request->validate([
            'id_akta' => 'required|exists:aktas,id_akta',
            'id_klien' => 'required|exists:kliens,id_klien',
            'peran' => 'required|string|max:50',
        ]);

        $aktaKlien->update($request->all());

        return redirect()->route('akta-klien.index')->with('success', 'Relasi berhasil diperbarui.');
    }

    public function destroy(AktaKlien $aktaKlien)
    {
        $aktaKlien->delete();

        return redirect()->route('akta-klien.index')->with('success', 'Relasi berhasil dihapus.');
    }
}
