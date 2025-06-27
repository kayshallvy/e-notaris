<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-gray-200 leading-tight">
            {{ __('Edit Dokumen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-gray-900">
                    <form action="{{ route('dokumen.update', $dokumen->id_dokumen) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama File -->
                            <div>
                                <label for="nama_file" class="block text-sm font-medium text-gray-700 text-gray-700">Nama File</label>
                                <input type="text" name="nama_file" id="nama_file" value="{{ old('nama_file', $dokumen->nama_file) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nama_file') border-red-500 @enderror">
                                @error('nama_file')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Akta Terkait -->
                            <div>
                                <label for="id_akta" class="block text-sm font-medium text-gray-700 text-gray-700">Akta Terkait</label>
                                <select name="id_akta" id="id_akta"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('id_akta') border-red-500 @enderror">
                                    <option value="">-- Pilih Akta --</option>
                                    @foreach($aktas as $akta)
                                        <option value="{{ $akta->id_akta }}" {{ old('id_akta', $dokumen->id_akta) == $akta->id_akta ? 'selected' : '' }}>
                                            {{ $akta->nomor_akta }} - {{ $akta->jenis_akta }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_akta')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div class="mt-6">
                            <label for="file" class="block text-sm font-medium text-gray-700 text-gray-700">Upload File Baru (Opsional)</label>
                            <input type="file" name="file" id="file"
                                   class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 text-gray-400 focus:outline-none bg-gray-700 border-gray-300 placeholder-gray-400 @error('file') border-red-500 @enderror">
                            <p class="mt-1 text-sm text-gray-700 text-gray-700">Biarkan kosong jika tidak ingin mengubah file. File saat ini: <a href="{{ asset('storage/' . $dokumen->path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">{{ $dokumen->nama_file }}</a></p>
                            @error('file')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('dokumen.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                                Kembali
                            </a>

                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-kopi border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sage focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kopi transition ease-in-out duration-150">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
