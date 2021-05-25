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
			<h1 class="h3 mb-0 text-gray-800">Rekap Usulan</h1>
			<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
								<th>KECAMATAN</th>
								<?php foreach ($services as $service): ?>
									<th><?php echo $service->name ?></th>
								<?php endforeach; ?>
								<th>TOTAL</th>
							
							</tr>
						</thead>
						<tbody>
							<?php
								$dinkes = 0;
								$disdik = 0;
								$disperkimtan = 0;
								$dlh = 0;
								$dputr = 0;
								$disdamkar = 0;
								$dinsos = 0;
								$diskopukm = 0;
								$disnaker = 0;
								$dispangkan = 0;
								$disparbud = 0;
								$dispora = 0;
								$distan = 0;
								$total = 0;
							?>
							<?php foreach ($overview as $view): 
								$dinkes += $view->dinkes;
								$disdik += $view->disdik;
								$disperkimtan += $view->disperkimtan;
								$dlh += $view->dlh;
								$dputr += $view->dputr;
								$disdamkar += $view->disdamkar;
								$dinsos += $view->dinsos;
								$diskopukm += $view->diskopukm;
								$disnaker += $view->disnaker;
								$dispangkan += $view->dispangkan;
								$disparbud += $view->disparbud;
								$dispora += $view->dispora;
								$distan += $view->distan;
								$total += $view->total;
							?>
								<tr>
									<td width="150"><b><?php echo $view->name ?></b></td>
									<td width="150"><?php echo number_format($view->dinkes) ?></td>
									<td width="150"><?php echo number_format($view->disdik) ?></td>
									<td width="150"><?php echo $view->disperkimtan ?></td>
									<td width="150"><?php echo $view->dlh ?></td>
									<td width="150"><?php echo $view->dputr ?></td>
									<td width="150"><?php echo $view->disdamkar ?></td>
									<td width="150"><?php echo $view->dinsos ?></td>
									<td width="150"><?php echo $view->diskopukm ?></td>
									<td width="150"><?php echo $view->disnaker ?></td>
									<td width="150"><?php echo $view->dispangkan ?></td>
									<td width="150"><?php echo $view->disparbud ?></td>
									<td width="150"><?php echo $view->dispora ?></td>
									<td width="150"><?php echo $view->distan ?></td>
									<td width="150"><?php echo number_format($view->total) ?></td>
								</tr>
							<?php endforeach; ?>
							<tr>
								<td width="150"><b>TOTAL</b></td>
								<td width="150"><b><?php echo $dinkes;?></b></td>
								<td width="150"><b><?php echo number_format($disdik);?></b></td>
								<td width="150"><b><?php echo number_format($disperkimtan);?></b></td>
								<td width="150"><b><?php echo number_format($dlh);?></b></td>
								<td width="150"><b><?php echo number_format($dputr);?></b></td>
								<td width="150"><b><?php echo number_format($disdamkar);?></b></td>
								<td width="150"><b><?php echo number_format($dinsos);?></b></td>
								<td width="150"><b><?php echo number_format($diskopukm);?></b></td>
								<td width="150"><b><?php echo number_format($disnaker);?></b></td>
								<td width="150"><b><?php echo number_format($dispangkan);?></b></td>
								<td width="150"><b><?php echo number_format($disparbud);?></b></td>
								<td width="150"><b><?php echo number_format($dispora);?></b></td>
								<td width="150"><b><?php echo number_format($distan);?></b></td>
								<td width="150"><b><?php echo number_format($total);?></b></td>
							</tr>
							<?php ?>
						</tbody>
					</table>
				</div>
			
			<!-- <i class="fas fa-chart-area"></i>
			Visitor Stats</div>
			<div class="card-body">
			<canvas id="myAreaChart" width="100%" height="30"></canvas>
			</div> -->
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
