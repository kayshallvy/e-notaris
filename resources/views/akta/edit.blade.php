<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Akta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('akta.update', $akta->id_akta) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nomor Akta -->
                            <div>
                                <label for="nomor_akta" class="block text-sm font-medium text-gray-700 text-gray-700">Nomor Akta</label>
                                <input type="text" name="nomor_akta" id="nomor_akta" value="{{ old('nomor_akta', $akta->nomor_akta) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nomor_akta') border-red-500 @enderror">
                                @error('nomor_akta')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jenis Akta -->
                            <div>
                                <label for="jenis_akta" class="block text-sm font-medium text-gray-700 text-gray-700">Jenis Akta</label>
                                <input type="text" name="jenis_akta" id="jenis_akta" value="{{ old('jenis_akta', $akta->jenis_akta) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('jenis_akta') border-red-500 @enderror">
                                @error('jenis_akta')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Dibuat -->
                            <div>
                                <label for="tanggal_dibuat" class="block text-sm font-medium text-gray-700 text-gray-700">Tanggal Dibuat</label>
                                <input type="date" name="tanggal_dibuat" id="tanggal_dibuat" value="{{ old('tanggal_dibuat', $akta->tanggal_dibuat) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('tanggal_dibuat') border-red-500 @enderror">
                                @error('tanggal_dibuat')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Notaris -->
                            <div>
                                <label for="id_notaris" class="block text-sm font-medium text-gray-700 text-gray-700">Notaris</label>
                                <select name="id_notaris" id="id_notaris" required
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('id_notaris') border-red-500 @enderror">
                                    <option value="">Pilih Notaris</option>
                                    @foreach($notarises as $n)
                                        <option value="{{ $n->id }}" {{ old('id_notaris', $akta->id_notaris) == $n->id ? 'selected' : '' }}>
                                            {{ $n->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_notaris')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="mt-6">
                            <label for="keterangan" class="block text-sm font-medium text-gray-700 text-gray-700">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" rows="4"
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('keterangan') border-red-500 @enderror">{{ old('keterangan', $akta->keterangan) }}</textarea>
                            @error('keterangan')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('akta.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
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
