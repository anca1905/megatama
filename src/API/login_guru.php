<?php
session_start();
header('Content-Type: application/json');
ini_set('display_errors', 0);

include "../config/config.php";

$id = $_POST['id'];
$password = $_POST['password'];

// Ambil data guru
$stmt = $conn->prepare("SELECT id_guru, ID, nama_guru, password FROM guru WHERE ID = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $guru = $result->fetch_assoc();

    if ($password === $guru['password']) {
        // Cari bidang tugasnya
        $id_guru = $guru['id_guru'];
        $queryBidang = "
            SELECT bt.nama_bidang
            FROM guru_bidang_tugas gbt
            JOIN bidang_tugas bt ON gbt.id_bidang = bt.id_bidang
            WHERE gbt.id_guru = '$id_guru' AND bt.nama_bidang LIKE 'Wali Kelas%'
            LIMIT 1
        ";
        $resultBidang = $conn->query($queryBidang);
        $kelasWali = null;

        if ($row = $resultBidang->fetch_assoc()) {
            // Ekstrak nomor kelas dari nama_bidang (misal "Wali Kelas 8" → "8")
            preg_match('/Wali Kelas (\d+)/', $row['nama_bidang'], $matches);
            if (isset($matches[1])) {
                $kelasWali = $matches[1]; // Ini kelas yang akan difilter
            }
        }

        // Simpan ke session
        $_SESSION['guru_id'] = $guru['id_guru'];
        $_SESSION['nama_guru'] = $guru['nama_guru'];
        $_SESSION['ID'] = $guru['ID'];
        $_SESSION['kelas_wali'] = $kelasWali; // <- ini akan digunakan untuk filter riwayat

        echo json_encode([
            'success' => true,
            'name' => $guru['nama_guru'],
            'kelas_wali' => $kelasWali
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'ID/Nama atau password Pegawai tidak valid']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID/Nama tidak ditemukan']);
}

$conn->close();
?>
