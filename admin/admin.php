<?php
	$dbLogin = new login;
	if($dbLogin->cek_login_no()) { 
		header("Location: ".config::base_url('index.php?pg=login'));
		die;
	}
	  
	$dbAdmin = new admin;
	$admins = $dbAdmin->tampil_admin('nama, waktu, admin_id');
?>
<div class="col-lg-6 col-lg-offset-3">
	<h2 class="judul text-center">Admin</h2>
	<a href="<?= config::base_url(); ?>" class="btn btn-default mb-10">Kembali!</a>
	<a href="<?= config::base_url('index.php?pg=tambah_admin'); ?>" class="btn btn-success mb-10">Tambah Admin!</a>

	<div class="list-group">
		<li class="list-group-item list-group-item-warning">
            <h4 class="list-group-item-heading">Daftar Admin <span class="badge normal"><?= count($admins??[]); ?></span></h4>
        </li>

        <?php  
        	// looping data admin
        	if($admins) :
        	foreach($admins as $r) :
        ?>
		<a class="list-group-item <?php if($r['admin_id'] === $_SESSION['tabungan']['admin_id']) echo 'list-group-item-success'; ?>" href="<?= config::base_url('index.php?pg=admin_detail&admin_id='.$r['admin_id']); ?>">
			<h4 class="list-group-item-heading"><?= $r['nama']; ?></h4>
			<p class="list-group-item-text">Bergabung sejak <?= date('d M Y, h:i a', $r['waktu']); ?></p>
		</a>
		<?php endforeach; endif; ?>
	</div>

	<p class="copy-right mt-20 mb-100">Copyright &copy; Reza Sariful Fikri. All Right Reserved</p>
</div>