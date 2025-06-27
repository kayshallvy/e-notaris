@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">
            <i class="bi bi-people"></i> Daftar Klien
        </h3>
        <a href="{{ route('klien.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Klien
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kliens as $klien)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $klien->nama }}</td>
                            <td>{{ $klien->nik }}</td>
                            <td>{{ $klien->email }}</td>
                            <td>{{ $klien->alamat }}</td>
                            <td>{{ $klien->no_telp }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('klien.edit', $klien->id_klien) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('klien.destroy', $klien->id_klien) }}" 
                                          method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data klien</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
