<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative bg-gradient-to-r from-kopi to-sage dark:from-kopi/90 dark:to-sage/90 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 sm:p-12 flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <div class="text-white z-10">
                        <h2 class="text-2xl md:text-4xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h2>
                        <div class="mt-2 text-lg font-medium text-krem/80" x-data="{
                            dateString: '',
                            init() {
                                const update = () => {
                                    this.dateString = new Date().toLocaleDateString('id-ID', {
                                        weekday: 'long',
                                        day: 'numeric',
                                        month: 'long',
                                        year: 'numeric'
                                    });
                                };
                                update();
                                setInterval(update, 60000);
                            }
                        }" x-init="init()">
                            <p x-text="dateString"></p>
                        </div>
                    </div>
                    <div class="relative mt-6 sm:mt-0 z-20" x-data="{ open: false }" @click.away="open = false">
                        <button @click="open = !open" class="flex items-center space-x-2 px-6 py-3 bg-white/20 text-white font-semibold rounded-lg hover:bg-white/30 transition-colors duration-300 backdrop-blur-sm">
                            <span>Buat Baru</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 transition-transform duration-300" :class="{'rotate-180': open}">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg py-1 z-20">
                            <a href="{{ route('notaris.create') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Notaris Baru</a>
                            <a href="{{ route('akta.create') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Akta Baru</a>
                            <a href="{{ route('dokumen.create') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Dokumen Baru</a>
                        </div>
                    </div>
                </div>
                <div class="hidden sm:block absolute inset-0 opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="h-full w-full text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M8.25 6h7.5M8.25 9h7.5M8.25 12h7.5M8.25 15h7.5M8.25 18h7.5M3.75 6h.008v.008H3.75V6zm.008 3h.008v.008H3.758V9zm.008 3h.008v.008H3.758v-.008zm.008 3h.008v.008H3.758v-.008zm.008 3h.008v.008H3.758v-.008zM20.25 6h.008v.008H20.25V6zm.008 3h.008v.008H20.258V9zm.008 3h.008v.008H20.258v-.008zm.008 3h.008v.008H20.258v-.008zm.008 3h.008v.008H20.258v-.008z" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                <!-- Card Notaris -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between transform hover:scale-105 transition-transform duration-300">
                    <div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-kopi/10 dark:bg-kopi/20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-kopi dark:text-krem">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m-7.5-2.962a3.75 3.75 0 015.25 0m-5.25 0a3.75 3.75 0 00-5.25 0m3.75 0a9.094 9.094 0 013.741-.479 3 3 0 014.682-2.72M12 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zm-3.75 0a3.75 3.75 0 00-3.75 3.75M12 12a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Notaris</h4>
                        </div>
                        <p class="text-5xl font-bold text-gray-800 dark:text-gray-100 mt-4">{{ $notarisCount }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('notaris.index') }}" class="inline-block w-full text-center px-4 py-3 bg-kopi text-white rounded-lg hover:bg-kopi/80 font-semibold">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- Card Akta -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between transform hover:scale-105 transition-transform duration-300">
                    <div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-sage/10 dark:bg-sage/20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-sage">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Akta</h4>
                        </div>
                        <p class="text-5xl font-bold text-gray-800 dark:text-gray-100 mt-4">{{ $aktaCount }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('akta.index') }}" class="inline-block w-full text-center px-4 py-3 bg-sage text-white rounded-lg hover:bg-sage/80 font-semibold">
                            Lihat Detail
                        </a>
                    </div>
                </div>

                <!-- Card Dokumen -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col justify-between transform hover:scale-105 transition-transform duration-300">
                    <div>
                        <div class="flex items-center space-x-4">
                            <div class="bg-gray-500/10 dark:bg-gray-400/20 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-600 dark:text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.75h16.5m-16.5 0a2.25 2.25 0 01-2.25-2.25V5.25A2.25 2.25 0 013.75 3h5.25a2.25 2.25 0 011.8.9l.6 1.2a2.25 2.25 0 001.8.9h5.25a2.25 2.25 0 012.25 2.25v1.5a2.25 2.25 0 01-2.25 2.25m-16.5 0h16.5m-16.5 0v6.75A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V9.75" />
                                </svg>
                            </div>
                            <h4 class="text-xl font-semibold text-gray-700 dark:text-gray-200">Dokumen</h4>
                        </div>
                        <p class="text-5xl font-bold text-gray-800 dark:text-gray-100 mt-4">{{ $dokumenCount }}</p>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('dokumen.index') }}" class="inline-block w-full text-center px-4 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 font-semibold">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
