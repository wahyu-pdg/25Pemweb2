<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['MEMBER'])) {
    header('Location: index.php?hal=login');
    exit;
}

$role = $_SESSION['MEMBER']['role'] ?? null;

if ($role !== 'admin') {
    echo "<script>
            alert('Akses ditolak!');
            window.location.href = 'index.php?hal=studies_list';
          </script>";
    exit;
} 