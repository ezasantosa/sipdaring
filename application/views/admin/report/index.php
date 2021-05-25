<!DOCTYPE html>
<html lang="en">
<style>
.table-responsive {
	position: relative;
	height: 500px;
	overflow: auto;
}
.table-responsive {
	display: block;
}

</style>
<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>

	<div id="content-wrapper">

		<div class="container-fluid">

        <!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
		<br/>
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
			<h1 class="h3 mb-0 text-gray-800">List Usulan</h1>
			<a href="<?php print site_url();?>/phpspreadsheet/downloadListUsulan" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank"><i
					class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
		</div>
		<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>

		<!-- Area Chart Example-->
		<div class="card mb-3">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover" id="dataTable" width="50%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Tgl Usul</th>
								<th>Pengusul</th>
								<th>Profil</th>
								<th>Kecamatan</th>
								<th>Urusan</th>
								<th>Usulan</th>
								<th>Permasalahan</th>
								<th>Alamat</th>
								<th>OPD Tujuan</th>
								<th>Rekomendasi Mitra Bappeda</th>
								<th>Kategori Usulan</th>
								<th>Koefisien</th>
								<th>Rekomendasi Desa</th>
								<th>Rekomendasi Kecamatan</th>
								<th>Rekomendasi SKPD</th>
								<th>Rekomendasi TAPD</th>
								<th>Status</th>
								<th>Anggaran</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i = 0;
								foreach ($temp_data as $data): 
									//print_r($data);
								$i++;
							?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $data->tgl_usul;?></td>
									<td><?php echo $data->pengusul;?></td>
									<td><?php echo $data->profil;?></td>
									<td><?php echo $data->district;?></td>
									<td><?php echo $data->urusan;?></td>
									<td><?php echo $data->usulan;?></td>
									<td><?php echo $data->permasalahan;?></td>
									<td><?php echo $data->alamat;?></td>
									<td><?php echo $data->opd_tujuan;?></td>
									<td><?php echo $data->rekomendasi_mitra_bappeda;?></td>
									<td><?php echo $data->kategori_usulan;?></td>
									<td><?php echo $data->koefisien;?></td>
									<td><?php echo $data->rekomendasi_desa;?></td>
									<td><?php echo $data->rekomendasi_kecamatan;?></td>
									<td><?php echo $data->rekomendasi_skpd;?></td>
									<td><?php echo $data->rekomendasi_tapd;?></td>
									<td><?php echo $data->status;?></td>
									<td><?php echo $data->anggaran;?></td>
								</tr>
							
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
		</div>

		</div>
		<!-- /.container-fluid -->

		<!-- Sticky Footer -->
		<?php $this->load->view("admin/_partials/footer.php") ?>

	</div>
	<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>
