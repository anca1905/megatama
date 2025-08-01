<?php
include "../src/api/get_dashboard_tu.php";

$query1 = "SELECT * FROM aktivitas ORDER BY waktu DESC LIMIT 5";
$result = $conn->query($query1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin-Yayasan Megatama Jambi</title>
    <link rel="stylesheet" href="css/final.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/toggle.js"></script>
</head>

<body class="font-poppins mode-2">
    <!-- Mobile overlay -->
    <div id="overlay" class="overlay"></div>

    <!-- Sidebar navigasi -->
    <div id="sidebar" class="sidebar text-white flex flex-col">
        <!-- Logo aplikasi -->
        <div class="flex items-center p-3 border-b border-blue-800">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                </svg>
                <h1 class="text-base font-bold ml-3 logo-text">Yayasan <br>Megatama</h1>
            </div>
        </div>

        <!-- Menu navigasi -->
        <div class="p-3">
            <p class="text-xs text-blue-300 mb-2 logo-text">Menu</p>
            <nav class="space-y-1">
                <a href="tu_dashboard.html"
                    class="menu-item active px-3 py-2 text-sm font-medium bg-blue-800 text-white rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <span class="menu-text">Dashboard</span>
                </a>
                <a href="tu_data_guru.html" class="menu-item px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                    </div>
                    <span class="menu-text">Data Guru</span>
                </a>
                <a href="tu_data_siswa.html" class="menu-item px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <span class="menu-text">Data Siswa</span>
                </a>
                <a href="tu_data_ruangan.html" class="menu-item px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="menu-text">Data Ruangan</span>
                </a>
                <a href="tu_peminjaman_ruangan.html"
                    class="menu-item px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <span class="menu-text">Peminjaman Ruangan</span>
                </a>
                <a href="tu_rekap_absensi.html"
                    class="menu-item px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="menu-text">Rekap Absensi</span>
                </a>
                <a href="tu_settings.html" class="menu-item px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="menu-text">Settings</span>
                </a>
            </nav>
        </div>

        <!-- Logout at bottom -->
        <div class="mt-auto p-3 border-t border-blue-800">
            <a href="index.html" class="menu-item-admin-tu px-3 py-2 text-sm font-medium text-blue-200 rounded-md">
                <div class="menu-icon-admin-tu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </div>
                <span class="menu-text-admin-tu">Logout</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="main-content-admin-tu">
        <!-- Top Navigation -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="px-5 py-2 flex items-center justify-between">
                <div class="flex items-center">
                    <button id="toggle-sidebar"
                        class="p-2 rounded-md text-gray-500 hover:text-gray-600 hover:bg-gray-100 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                    <h1 class="ml-3 text-lg font-semibold text-gray-800">Dashboard</h1>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center">
                        <div class="avatar-ring-admin-tu">
                            <img class="h-8 w-8 rounded-full object-cover"
                                src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin avatar">
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-700">Admin TU 1</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="p-4 bg-pattern">
            <!-- Welcome Message -->
            <div class="welcome-card-admin-tu">
                <h2>Welcome Back, Admin TU 1 👋</h2>
            </div>

            <!-- Status Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-4">
                <!-- Status Card 1 -->
                <div class="card card-gradient-top-admin-tu p-3">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-medium text-gray-500">Absen Datang Hari Ini</h3>
                    </div>
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M4 2a2 2 0 0 0-2 2v4h2V4h4V2H4zm16 0h-4v2h4v4h2V4a2 2 0 0 0-2-2zM4 18H2v4a2 2 0 0 0 2 2h4v-2H4v-4zm16 0v4h-4v2h4a2 2 0 0 0 2-2v-4h-2zM12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                            </svg>
                        </div>
                        <div>
                            <?php if ($datang > 0): ?>
                                <p class="text-2xl font-bold text-gray-800">
                                    <?= $datang ?> <span class="text-sm text-gray-500 font-normal">/ <?= $total ?> Total Guru</span>
                                </p>
                            <?php else: ?>
                                <p class="text-sm font-bold text-gray-500">Belum ada absen datang</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <!-- Status Card 2 -->
                <div class="card card-gradient-top-admin-tu success p-3">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-medium text-gray-500">Absen Pulang Hari Ini</h3>
                    </div>
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-success" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M4 2a2 2 0 0 0-2 2v4h2V4h4V2H4zm16 0h-4v2h4v4h2V4a2 2 0 0 0-2-2zM4 18H2v4a2 2 0 0 0 2 2h4v-2H4v-4zm16 0v4h-4v2h4a2 2 0 0 0 2-2v-4h-2zM12 12a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 2c-2.33 0-7 1.17-7 3.5V20h14v-2.5c0-2.33-4.67-3.5-7-3.5z" />
                            </svg>
                        </div>
                        <div>
                            <?php if ($pulang > 0): ?>
                                <p class="text-2xl font-bold text-gray-800">
                                    <?= $pulang ?> <span class="text-sm text-gray-500 font-normal">/ <?= $total ?> Total Guru</span>
                                </p>
                            <?php else: ?>
                                <p class="text-sm font-bold text-gray-500">Belum ada absen pulang</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <!-- Status Card 3 -->
                <div class="card card-gradient-top-admin-tu warning p-3">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-medium text-gray-500">Total Siswa</h3>
                    </div>
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-full bg-orange-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-800"><?= $total_siswa ?> <span
                                    class="text-sm text-gray-500 font-normal">Siswa</span></p>
                        </div>
                    </div>
                </div>

                <!-- Status Card 4 -->
                <div class="card card-gradient-top-admin-tu danger p-3">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-medium text-gray-500">Ruang Dipinjam Hari Ini</h3>
                    </div>
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-danger" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-2xl font-bold text-gray-800"><?= $total_ruang ?> <span
                                    class="text-sm text-gray-500 font-normal">ruangan</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Peminjaman Ruangan dan Aktivitas Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-4">
                <!-- Peminjaman Ruangan -->
                <div class="lg:col-span-2 card">
                    <div class="card-header-admin-tu flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-700">Peminjaman Ruangan</h3>
                        <div class="flex space-x-2">
                            <select id="room-filter"
                                class="text-xs border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="chart-container-admin-tu">
                            <canvas id="room-chart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Aktivitas Terbaru -->
                <div class="card">
                    <div class="card-header-admin-tu flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-700">Aktivitas Terbaru</h3>
                    </div>
                    <div class="p-3">
                        <div class="space-y-2">
                            <?php include "../src/api/aktivitas.php" ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kehadiran Guru dan Jumlah Siswa -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 mb-4">
                <!-- Kehadiran Guru -->
                <div class="card">
                    <div class="card-header-admin-tu flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-700">Kehadiran Guru</h3>
                        <div class="flex space-x-2">
                            <select id="teacher-month-filter"
                                class="text-xs border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei" selected>Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                            <div class="flex space-x-1">
                                <button id="tab-teacher-datang" class="tab-button-admin-tu active">Absen Datang</button>
                                <button id="tab-teacher-pulang" class="tab-button-admin-tu">Absen Pulang</button>
                            </div>
                        </div>
                    </div>
                    <div class="p-3">
                        <!-- Tab content for Absen Datang -->
                        <div id="content-teacher-datang" class="tab-content-admin-tu active">
                            <div class="chart-container-small-admin-tu">
                                <canvas id="teacher-chart-datang"></canvas>
                                <div id="no-data-message-datang" class="no-data-message"></div>
                            </div>
                        </div>

                        <!-- Tab content for Absen Pulang -->
                        <div id="content-teacher-pulang" class="tab-content-admin-tu">
                            <div class="chart-container-small-admin-tu">
                                <canvas id="teacher-chart-pulang"></canvas>
                                <div id="no-data-message-pulang" class="no-data-message"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Siswa -->
                <div class="card">
                    <div class="card-header-admin-tu flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-700">Jumlah Siswa</h3>
                        <div class="flex space-x-2">
                            <select id="student-filter"
                                class="text-xs border border-gray-300 rounded-md px-2 py-1 focus:outline-none focus:ring-1 focus:ring-primary">
                                <option value="kelas7" selected>Kelas 7</option>
                                <option value="kelas8">Kelas 8</option>
                                <option value="kelas9">Kelas 9</option>
                                <option value="kelas10">Kelas 10</option>
                                <option value="kelas11">Kelas 11</option>
                                <option value="kelas12">Kelas 12</option>

                            </select>
                        </div>
                    </div>
                    <div class="p-3">
                        <div class="chart-container-small-admin-tu">
                            <canvas id="student-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <style>
        /* CSS dasar untuk pesan no-data agar terpusat */
        .no-data-message {
            height: 100%;
            /* Sesuaikan dengan tinggi chart container Anda */
            width: 100%;
            display: flex;
            /* Menggunakan flexbox untuk centering */
            justify-content: center;
            /* Pusatkan secara horizontal */
            align-items: center;
            /* Pusatkan secara vertikal */
            flex-direction: column;
            /* Untuk menumpuk teks */
        }
    </style>
    <script src="js/tu_dashboard.js"></script>
</body>

</html>