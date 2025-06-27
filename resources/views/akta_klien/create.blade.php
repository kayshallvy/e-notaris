@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            <i class="bi bi-plus-circle"></i> Tambah Klien Akta
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('akta-klien.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_akta" class="form-label">Akta</label>
                    <select class="form-select @error('id_akta') is-invalid @enderror" 
                            id="id_akta" name="id_akta" required>
                        <option value="">-- Pilih Akta --</option>
                        @foreach($aktas as $akta)
                            <option value="{{ $akta->id_akta }}" {{ old('id_akta') == $akta->id_akta ? 'selected' : '' }}>
                                {{ $akta->nomor_akta }} - {{ $akta->jenis_akta }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_akta')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="id_klien" class="form-label">Klien</label>
                    <select class="form-select @error('id_klien') is-invalid @enderror" 
                            id="id_klien" name="id_klien" required>
                        <option value="">-- Pilih Klien --</option>
                        @foreach($kliens as $klien)
                            <option value="{{ $klien->id_klien }}" {{ old('id_klien') == $klien->id_klien ? 'selected' : '' }}>
                                {{ $klien->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_klien')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="peran" class="form-label">Peran</label>
                <input type="text" class="form-control @error('peran') is-invalid @enderror" 
                       id="peran" name="peran" value="{{ old('peran') }}" required>
                @error('peran')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('akta-klien.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
