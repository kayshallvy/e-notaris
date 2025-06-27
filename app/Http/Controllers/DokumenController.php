<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Akta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    public function index()
    {
        $dokumens = Dokumen::with('akta')->where('user_id', Auth::id())->get();
        return view('dokumen.index', compact('dokumens'));
    }

    public function create()
    {
        $aktas = Akta::all();
        return view('dokumen.create', compact('aktas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_akta' => 'required|exists:aktas,id_akta',
            'nama_file' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('dokumen', $fileName, 'public');
            
            Dokumen::create([
                'id_akta' => $request->id_akta,
                'nama_file' => $request->nama_file,
                'tipe_file' => $file->getClientOriginalExtension(),
                'path_file' => $filePath,
                'tanggal_upload' => Carbon::now()->setTimezone('Asia/Jakarta'),
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('dokumen.index')
                ->with('success', 'Dokumen berhasil diupload.');
        }

        return redirect()->back()
            ->with('error', 'Gagal mengupload dokumen.');
    }

    public function edit($id_dokumen)
    {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        if ($dokumen->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        $aktas = Akta::all();
        return view('dokumen.edit', compact('dokumen', 'aktas'));
    }

    public function update(Request $request, $id_dokumen)
    {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        if ($dokumen->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }

        $request->validate([
            'id_akta' => 'required|exists:aktas,id_akta',
            'nama_file' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'id_akta' => $request->id_akta,
            'nama_file' => $request->nama_file,
        ];

        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($dokumen->path_file && Storage::disk('public')->exists($dokumen->path_file)) {
                Storage::disk('public')->delete($dokumen->path_file);
            }
            
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('dokumen', $fileName, 'public');
            
            $data['tipe_file'] = $file->getClientOriginalExtension();
            $data['path_file'] = $filePath;
        }

        $dokumen->update($data);

        return redirect()->route('dokumen.index')
            ->with('success', 'Dokumen berhasil diperbarui.');
    }

    public function destroy($id_dokumen)
    {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        if ($dokumen->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        
        // Hapus file dari storage jika ada
        if ($dokumen->path_file && Storage::disk('public')->exists($dokumen->path_file)) {
            Storage::disk('public')->delete($dokumen->path_file);
        }
        
        $dokumen->delete();

        return redirect()->route('dokumen.index')
            ->with('success', 'Dokumen berhasil dihapus.');
    }

    public function show($id_dokumen)
    {
        $dokumen = Dokumen::with('akta')->findOrFail($id_dokumen);
        if ($dokumen->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        return view('dokumen.show', compact('dokumen'));
    }

    public function download($id_dokumen)
    {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        if ($dokumen->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        $filePath = storage_path('app/public/' . $dokumen->path_file);
        
        if (!Storage::disk('public')->exists($dokumen->path_file)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath, $dokumen->nama_file . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
    }

    public function view($id_dokumen)
    {
        $dokumen = Dokumen::findOrFail($id_dokumen);
        if ($dokumen->user_id !== Auth::id()) {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES');
        }
        $filePath = storage_path('app/public/' . $dokumen->path_file);
        
        if (!Storage::disk('public')->exists($dokumen->path_file)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->file($filePath);
    }
}
