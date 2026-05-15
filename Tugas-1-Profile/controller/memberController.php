<?php
session_start(); // memulai session
include_once '../koneksi.php';
include_once '../models/Member.php';

// 1. tangkap input
$uname = $_POST['username']; 
$password = md5($_POST['password']); // 🔥 FIX DI SINI

// 2. simpan ke array
$data = [
    $uname,
    $password,
];

// 3. proses login
$obj_member = new Member();
$rs = $obj_member->cekLogin($data);

if (!empty($rs)) { // sukses login
    $_SESSION['MEMBER'] = $rs;
    header('location: ../index.php?hal=studies_list');
} else { // gagal login
    echo '<script>alert("Username/Password Anda Salah!!!");history.go(-1);</script>';
}
?>