<?php
session_start();

// 1. CEK KEAMANAN: Pastikan user sudah login dan role-nya admin
if (!isset($_SESSION['MEMBER']) || $_SESSION['MEMBER']['role'] != 'admin') {
    echo "<div style='text-align:center; margin-top:50px;'>";
    echo "<h3 style='color:red;'>Akses Ditolak!</h3>";
    echo "<p>Anda harus login sebagai Admin untuk mengakses halaman ini.</p>";
    echo "<a href='../index.php' class='btn btn-primary'>Kembali ke Beranda</a>";
    echo "</div>";
    exit;
}

// 2. KONEKSI DATABASE (Hanya sekali include)
include_once '../koneksi.php';

// Ambil parameter proses (bisa dari POST form atau GET link)
 $proses = $_POST['proses'] ?? $_GET['proses'] ?? '';

// --- LOGIKA SIMPAN (INSERT) ---
if ($proses == "simpan") {

    // Ambil data dari form
    $nama        = $_POST['nama'] ?? '';
    $idlevel     = $_POST['idlevel'] ?? '';
    $keterangan  = $_POST['keterangan'] ?? '';
    $tahun_lulus = $_POST['tahun_lulus'] ?? '';

    // Inisialisasi variabel foto (kosong jika tidak ada upload)
    $foto = '';

    // Cek apakah ada file yang diupload
    if (isset($_FILES['foto_sekolah']) && $_FILES['foto_sekolah']['error'] == 0) {

        $namaFile   = $_FILES['foto_sekolah']['name'];
        $tmpFile    = $_FILES['foto_sekolah']['tmp_name'];
        $ukuran     = $_FILES['foto_sekolah']['size'];

        // Validasi Ekstensi File
        $ekstensi      = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));
        $ekstensiAllow = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($ekstensi, $ekstensiAllow)) {
            die('<script>alert("Format file tidak didukung! Gunakan jpg, jpeg, png, atau gif."); history.back();</script>');
        }

        // Validasi Ukuran File (Max 2MB)
        if ($ukuran > 2 * 1024 * 1024) { 
            die('<script>alert("Ukuran file terlalu besar! Maksimal 2MB."); history.back();</script>');
        }

        // Generate nama file unik agar tidak timpa file lain (misal: 169876543_foto.jpg)
        $foto   = time() . '_' . basename($namaFile); 
        $folder = "../uploads/";

        // Buat folder uploads jika belum ada
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        // Pindahkan file dari temp ke folder uploads
        if (!move_uploaded_file($tmpFile, $folder . $foto)) {
            die('<script>alert("Gagal mengupload foto ke server."); history.back();</script>');
        }
    }

    // Simpan ke Database
    try {
        $sql = "INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus, foto_sekolah) 
                VALUES (?, ?, ?, ?, ?)";
        $ps = $dbh->prepare($sql);
        $ps->execute([$nama, $idlevel, $keterangan, $tahun_lulus, $foto]);

        header('Location: ../index.php?hal=studies_list');
        exit;
    } catch (PDOException $e) {
        die('<script>alert("Terjadi kesalahan Database saat menyimpan: ' . $e->getMessage() . '"); history.back();</script>');
    }
}

// --- LOGIKA HAPUS (DELETE) ---
if ($proses == "hapus" && isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // 1. Ambil data foto dulu berdasarkan ID
        $sqlFoto = "SELECT foto_sekolah FROM studies WHERE id=?";
        $psFoto  = $dbh->prepare($sqlFoto);
        $psFoto->execute([$id]);
        $dataFoto = $psFoto->fetch(PDO::FETCH_ASSOC);

        // 2. Hapus file fisik dari folder uploads jika ada
        if ($dataFoto && !empty($dataFoto['foto_sekolah'])) {
            $filePath = "../uploads/" . $dataFoto['foto_sekolah'];
            if (file_exists($filePath)) {
                unlink($filePath); // Menghapus file
            }
        }

        // 3. Hapus data dari database
        $sql = "DELETE FROM studies WHERE id=?";
        $ps  = $dbh->prepare($sql);
        $ps->execute([$id]);

        header('Location: ../index.php?hal=studies_list');
        exit;

    } catch (PDOException $e) {
        die('<script>alert("Terjadi kesalahan Database saat menghapus: ' . $e->getMessage() . '"); history.back();</script>');
    }
}
?>