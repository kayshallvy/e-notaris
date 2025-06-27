<?php

namespace App\Http\Controllers;

use App\Models\Akta;
use App\Models\Notaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AktaController extends Controller
{
        public function index()
    {
        $aktas = Akta::with('notaris')->where('user_id', Auth::id())->get();
        return view('akta.index', compact('aktas'));
    }

        public function create()
    {
        $notarises = Notaris::where('user_id', Auth::id())->get();
        return view('akta.create', compact('notarises'));
    }

        public function show(Akta $akta)
    {
        if ($akta->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        return view('akta.show', compact('akta'));
    }

        public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_notaris' => 'required|exists:notarises,id',
            'nomor_akta' => 'required',
            'jenis_akta' => 'required',
            'tanggal_dibuat' => 'required|date',
            'keterangan' => 'nullable',
        ]);

        $validatedData['user_id'] = Auth::id();
        Akta::create($validatedData);

        return redirect()->route('akta.index')->with('success', 'Akta berhasil dibuat.');
    }

        public function edit(Akta $akta)
    {
        if ($akta->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        $notarises = Notaris::where('user_id', Auth::id())->get();
        return view('akta.edit', compact('akta', 'notarises'));
    }

        public function update(Request $request, Akta $akta)
    {
        if ($akta->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }

        $validatedData = $request->validate([
            'id_notaris' => 'required|exists:notarises,id',
            'nomor_akta' => 'required',
            'jenis_akta' => 'required',
            'tanggal_dibuat' => 'required|date',
            'keterangan' => 'nullable',
        ]);

        $akta->update($validatedData);

        return redirect()->route('akta.index')->with('success', 'Akta berhasil diperbarui.');
    }

        public function destroy(Akta $akta)
    {
        if ($akta->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        $akta->delete();

        return redirect()->route('akta.index')->with('success', 'Akta berhasil dihapus.');
    }
}
