<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();
$role=$_SESSION['kode_role']??'';
$canManage = in_array($role,['ADMIN','OPERATOR_PRODI'],true);
?>
<aside class="sidebar" id="sidebar">
    <div class="sidebar-title">MENU UTAMA</div>
    <a href="dashboard.php" class="sidebar-link"><span>▦</span> Dashboard</a>

    <?php if ($canManage): ?>
    <div class="sidebar-title">DATA AKADEMIK</div>
    <a href="mahasiswa.php" class="sidebar-link"><span>👨‍🎓</span> Data Mahasiswa</a>
    <?php endif; ?>

    <?php if ($role==='ADMIN'): ?>
    <a href="fakultas.php" class="sidebar-link"><span>🏛</span> Fakultas</a>
    <a href="prodi.php" class="sidebar-link"><span>📚</span> Program Studi</a>
    <div class="sidebar-title">MANAJEMEN PENGGUNA</div>
    <a href="pengguna.php" class="sidebar-link"><span>👥</span> Pengguna</a>
    <a href="role.php" class="sidebar-link"><span>🔐</span> Role</a>
    <?php endif; ?>

    <?php if (in_array($role,['ADMIN','DEKANAT','REKTORAT'],true)): ?>
    <div class="sidebar-title">LAPORAN</div>
    <a href="laporan.php" class="sidebar-link"><span>📊</span> Rekap Mahasiswa</a>
    <?php endif; ?>

    <?php if ($role==='ADMIN'): ?>
    <div class="sidebar-title">SISTEM</div>
    <a href="audit.php" class="sidebar-link"><span>📝</span> Audit Log</a>
    <?php endif; ?>
</aside>
