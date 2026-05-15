<?php
// Pastikan session aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$obj = new Studies();
$rs  = $obj->index();

// Ambil role dengan aman
$role = $_SESSION['MEMBER']['role'] ?? null;
?>

<h3>Data Pendidikan</h3>

<?php if ($role === 'admin'): ?>
    <a href="index.php?hal=studies_form" class="btn btn-primary mb-3">Tambah</a>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Keterangan</th>
            <th>Tahun Lulus</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($rs as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['nama_level']) ?></td>
            <td><?= htmlspecialchars($row['keterangan']) ?></td>
            <td><?= htmlspecialchars($row['tahun_lulus']) ?></td>
            <td>
                <?php if (!empty($row['foto_sekolah'])): ?>
                    <img src="uploads/<?= htmlspecialchars($row['foto_sekolah']) ?>" 
                         width="80" height="80"
                         style="object-fit: cover; border-radius: 5px; cursor: pointer;"
                         data-bs-toggle="modal" data-bs-target="#modalFoto"
                         data-foto="uploads/<?= htmlspecialchars($row['foto_sekolah']) ?>"
                         data-nama="<?= htmlspecialchars($row['nama']) ?>">
                <?php else: ?>
                    <span class="badge bg-secondary">Tidak ada foto</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($role === 'admin'): ?>
                    <a href="controller/studiesController.php?proses=hapus&id=<?= $row['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                       <i class="bi bi-trash"></i> Hapus
                    </a>
                <?php else: ?>
                    <span class="text-muted small">-</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Foto -->
<div class="modal fade" id="modalFoto" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNamaSekolah"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="gambarModal" src="" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('[data-bs-target="#modalFoto"]').forEach(function(img) {
    img.addEventListener('click', function() {
        document.getElementById('gambarModal').src = this.dataset.foto;
        document.getElementById('modalNamaSekolah').textContent = this.dataset.nama;
    });
});
</script>