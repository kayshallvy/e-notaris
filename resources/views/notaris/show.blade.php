<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Notaris') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-900">{{ $notaris->nama }}</h3>
                        <p class="mt-1 text-sm text-gray-600 text-gray-500">Detail informasi notaris.</p>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700">
                        <dl class="divide-y divide-gray-200 dark:divide-gray-700">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 text-gray-500">Nama Lengkap</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-900 sm:mt-0 sm:col-span-2">{{ $notaris->nama }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-900 sm:mt-0 sm:col-span-2">{{ $notaris->email }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 text-gray-500">Alamat</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-900 sm:mt-0 sm:col-span-2">{{ $notaris->alamat }}</dd>
                            </div>
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 text-gray-500">No. Telepon</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-gray-900 sm:mt-0 sm:col-span-2">{{ $notaris->no_telp }}</dd>
                            </div>
                        </dl>
                    </div>

                    <div class="flex items-center justify-end mt-6 space-x-4">
                        <a href="{{ route('notaris.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                            Kembali
                        </a>
                        <a href="{{ route('notaris.edit', $notaris->id) }}" class="px-4 py-2 bg-sage text-white rounded-md hover:bg-sage/80">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
