<x-app-layout>
    <div class="p-4 sm:ml-64">
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>

        <!-- Statistik Umum -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h3 class="text-xl font-semibold mb-2">Statistik Umum</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Jumlah Artikel -->
                <div class="p-4 bg-gray-100 rounded-lg">
                    <h4 class="text-lg font-semibold mb-2">Jumlah Artikel</h4>
                    <p class="text-xl font-bold">100</p>
                </div>
                <!-- Jumlah Pengguna -->
                <div class="p-4 bg-gray-100 rounded-lg">
                    <h4 class="text-lg font-semibold mb-2">Jumlah Pengguna</h4>
                    <p class="text-xl font-bold">500</p>
                </div>
                <!-- Jumlah Komentar -->
                <div class="p-4 bg-gray-100 rounded-lg">
                    <h4 class="text-lg font-semibold mb-2">Jumlah Komentar</h4>
                    <p class="text-xl font-bold">250</p>
                </div>
            </div>
        </div>

        <!-- Daftar Artikel Terbaru -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h3 class="text-xl font-semibold mb-2">Daftar Artikel Terbaru</h3>
            <ul>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">Judul Artikel 1</a>
                    <span class="text-gray-500 text-sm">- 15 Mei 2024</span>
                </li>
                <li class="mb-2">
                    <a href="#" class="text-blue-500 hover:underline">Judul Artikel 2</a>
                    <span class="text-gray-500 text-sm">- 14 Mei 2024</span>
                </li>
                <!-- Tambahkan artikel terbaru lainnya di sini -->
            </ul>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h3 class="text-xl font-semibold mb-2">Aktivitas Terbaru</h3>
            <ul>
                <li class="mb-2">
                    <span class="text-gray-500 text-sm">Pengguna John Doe membuat artikel baru</span>
                </li>
                <li class="mb-2">
                    <span class="text-gray-500 text-sm">Pengguna Jane Doe mengomentari artikel</span>
                </li>
                <!-- Tambahkan aktivitas terbaru lainnya di sini -->
            </ul>
        </div>

        <!-- Pemberitahuan -->
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h3 class="text-xl font-semibold mb-2">Pemberitahuan</h3>
            <p class="text-gray-500 text-sm">Tidak ada pemberitahuan saat ini.</p>
        </div>
    </div>
</x-app-layout>
