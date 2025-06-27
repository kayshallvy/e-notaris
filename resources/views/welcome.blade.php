<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-center text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Selamat Datang di E-Notaris</h1>
                    <p class="mt-2 text-lg text-gray-600 dark:text-gray-400">Sistem Manajemen Dokumen Notaris yang Modern dan Efisien</p>
                </div>
            </div>

            <!-- Features Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Notaris Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center flex flex-col justify-between transform hover:scale-105 transition-transform duration-300">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Notaris</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Kelola data notaris dengan mudah dan efisien</p>
                    </div>
                    <a href="{{ route('notaris.index') }}" class="mt-4 inline-block bg-kopi text-white font-semibold py-2 px-4 rounded-lg hover:bg-sage transition-colors duration-300">
                        Lihat Notaris
                    </a>
                </div>

                <!-- Akta Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center flex flex-col justify-between transform hover:scale-105 transition-transform duration-300">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Akta</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Manajemen akta notaris yang terstruktur</p>
                    </div>
                    <a href="{{ route('akta.index') }}" class="mt-4 inline-block bg-kopi text-white font-semibold py-2 px-4 rounded-lg hover:bg-sage transition-colors duration-300">
                        Lihat Akta
                    </a>
                </div>

                <!-- Dokumen Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center flex flex-col justify-between transform hover:scale-105 transition-transform duration-300">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Dokumen</h3>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Penyimpanan dan pengelolaan dokumen yang aman</p>
                    </div>
                    <a href="{{ route('dokumen.index') }}" class="mt-4 inline-block bg-kopi text-white font-semibold py-2 px-4 rounded-lg hover:bg-sage transition-colors duration-300">
                        Lihat Dokumen
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
