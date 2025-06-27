<?php

namespace App\Http\Controllers;

use App\Models\Notaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotarisController extends Controller
{
    public function index()
    {
        $notarises = Notaris::where('user_id', Auth::id())->get();
        return view('notaris.index', compact('notarises'));
    }

    public function create()
    {
        return view('notaris.create');
    }

    public function show(Notaris $notaris)
    {
        if ($notaris->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        return view('notaris.show', compact('notaris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $validatedData['user_id'] = Auth::id();
        Notaris::create($validatedData);

        return redirect()->route('notaris.index')
                         ->with('success', 'Notaris berhasil ditambahkan.');
    }

    public function edit(Notaris $notaris)
    {
        if ($notaris->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        return view('notaris.edit', compact('notaris'));
    }

    public function update(Request $request, Notaris $notaris)
    {
        if ($notaris->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }

        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $notaris->update($validatedData);

        return redirect()->route('notaris.index')
                         ->with('success', 'Notaris berhasil diperbarui.');
    }

    public function destroy(Notaris $notaris)
    {
        if ($notaris->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        $notaris->delete();

        return redirect()->route('notaris.index')
                         ->with('success', 'Notaris berhasil dihapus.');
    }
}
