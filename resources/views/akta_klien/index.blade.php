@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="bi bi-people"></i> Daftar Klien Akta
        </h3>
        <a href="{{ route('akta-klien.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Klien Akta
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @php
            $groupedAktaKliens = $aktaKliens->groupBy('akta.id_akta');
        @endphp
        @forelse($groupedAktaKliens as $aktaId => $klienGroup)
            @php
                $firstKlien = $klienGroup->first();
                $akta = $firstKlien->akta;
            @endphp
            <div class="akta-group mb-4">
                <div class="akta-header p-4">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-2">
                                <i class="bi bi-file-text"></i>
                                {{ $akta->nomor_akta }}
                            </h4>
                            <div class="akta-info">
                                <p class="mb-1">
                                    <strong>Jenis Akta:</strong> 
                                    <span class="badge bg-info">{{ $akta->jenis_akta }}</span>
                                </p>
                                <p class="mb-1">
                                    <strong>Tanggal:</strong> 
                                    {{ \Carbon\Carbon::parse($akta->tanggal_dibuat)->isoFormat('D MMMM Y') }}
                                </p>
                                <p class="mb-1">
                                    <strong>Notaris:</strong> 
                                    {{ $akta->notaris->nama }}
                                </p>
                                <p class="mb-0">
                                    <strong>Deskripsi:</strong> 
                                    {{ $akta->keterangan ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="akta-content p-4">
                    <h5 class="mb-3">
                        <i class="bi bi-people-fill"></i> Daftar Klien
                    </h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Klien</th>
                                    <th>Peran</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($klienGroup as $aktaKlien)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-person-circle me-2 text-maroon"></i>
                                                {{ $aktaKlien->klien->nama }}
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-maroon">{{ $aktaKlien->peran }}</span>
                                        </td>
                                        <td>
                                            <small>
                                                <i class="bi bi-telephone me-1"></i> {{ $aktaKlien->klien->no_telp }}<br>
                                                <i class="bi bi-envelope me-1"></i> {{ $aktaKlien->klien->email }}
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('akta-klien.edit', ['aktaKlien' => $aktaKlien->id_akta_klien]) }}" 
                                                   class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('akta-klien.destroy', ['aktaKlien' => $aktaKlien->id_akta_klien]) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                            title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5">
                <i class="bi bi-inbox display-1 text-muted"></i>
                <p class="mt-3 h5">Tidak ada data klien akta</p>
                <a href="{{ route('akta-klien.create') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle"></i> Tambah Klien Akta
                </a>
            </div>
        @endforelse
    </div>
</div>

<style>
.akta-group {
    border: 1px solid #dee2e6;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.akta-header {
    background: linear-gradient(135deg, var(--maroon) 0%, var(--maroon-dark) 100%);
    color: white;
}

.akta-info {
    font-size: 0.95rem;
    opacity: 0.9;
}

.akta-content {
    background-color: #fff;
}

.badge.bg-maroon {
    background-color: var(--maroon);
    color: white;
    padding: 0.5em 1em;
    font-weight: 500;
}

.table-hover tbody tr:hover {
    background-color: rgba(128, 0, 0, 0.05);
}

.btn-group {
    gap: 0.5rem;
}

@media (max-width: 768px) {
    .akta-header {
        text-align: center;
    }
}
</style>
@endsection
