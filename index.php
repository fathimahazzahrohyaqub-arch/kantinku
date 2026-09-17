<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: frontend/auth/login.php");
    exit;
}

// Pengalihan berdasarkan role pengguna
$role = $_SESSION['role'] ?? '';

switch ($role) {
    case 'admin':
        header("Location: frontend/admin/index.php");
        exit;

    case 'petugas':
        header("Location: frontend/petugas/index.php");
        exit;

    case 'siswa':
        header("Location: frontend/siswa/index.php");
        exit;

    default:
        session_destroy();
        header("Location: frontend/auth/login.php");
        exit;
}
?>