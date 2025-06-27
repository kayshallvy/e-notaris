<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-700 text-gray-200 leading-tight">
            {{ __('Detail Dokumen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900">{{ $dokumen->nama_file }}</h3>
                        <p class="mt-1 text-sm text-gray-600">Detail lengkap untuk dokumen.</p>
                    </div>

                    <div class="border-t border-gray-300">
                        <dl class="divide-y divide-gray-200">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-700">Tipe File</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $dokumen->tipe_file }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-700">Tanggal Upload</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ \Carbon\Carbon::parse($dokumen->tanggal_upload)->isoFormat('D MMMM YYYY, HH:mm') }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-700">Akta Terkait</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $dokumen->akta ? $dokumen->akta->nomor_akta : '-' }}</dd>
                            </div>
                             <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-700">File</dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="flex items-center space-x-4">
                                        <a href="{{ route('dokumen.view', $dokumen->id_dokumen) }}" target="_blank" class="px-4 py-2 bg-kopi text-white rounded-md hover:bg-kopi/80">
                                            Lihat File
                                        </a>
                                        <a href="{{ route('dokumen.download', $dokumen->id_dokumen) }}" class="px-4 py-2 bg-krem text-kopi rounded-md hover:bg-krem/80">
                                            Download
                                        </a>
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <a href="{{ route('dokumen.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                            Kembali
                        </a>
                        <a href="{{ route('dokumen.edit', $dokumen->id_dokumen) }}" class="px-4 py-2 bg-sage text-white rounded-md hover:bg-sage/80">
                            Edit
                        </a>
                        <form action="{{ route('dokumen.destroy', $dokumen->id_dokumen) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>