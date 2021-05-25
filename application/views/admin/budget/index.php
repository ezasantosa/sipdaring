<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/budgets/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
                                        <th>No</th>
										<th>Kecamatan</th>
										<th>Dinkes</th>
                                        <th>Disdik</th>
                                        <th>Disperkimtan</th>
                                        <th>DLH</th>
										<th>DPUTR</th>
                                        <th>Disdamkar</th>
                                        <th>Dinsos</th>
                                        <th>DiskopUKM</th>
										<th>Disnaker</th>
                                        <th>Dispakan</th>
                                        <th>Disparbud</th>
                                        <th>Dispora</th>
                                        <th>Distan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
                                        $i = 0; 
                                        foreach ($budgets as $budget):
                                        $i++;
                                    ?>
									<tr>
                                        <td width="50"><?php echo $i;?></td>
										<td><?php echo $budget->kecamatan ?></td>
                                        <td><?php echo number_format($budget->dinkes) ?></td>
                                        <td><?php echo number_format($budget->disdik) ?></td>
                                        <td><?php echo number_format($budget->disperkimtan) ?></td>
                                        <td><?php echo number_format($budget->dlh) ?></td>
                                        <td><?php echo number_format($budget->dputr) ?></td>
                                        <td><?php echo number_format($budget->disdamkar) ?></td>
                                        <td><?php echo number_format($budget->dinsos) ?></td>
                                        <td><?php echo number_format($budget->diskopukm) ?></td>
                                        <td><?php echo number_format($budget->disnaker) ?></td>
                                        <td><?php echo number_format($budget->dispakan) ?></td>
                                        <td><?php echo number_format($budget->disparbud) ?></td>
                                        <td><?php echo number_format($budget->dispora) ?></td>
                                        <td><?php echo number_format($budget->distan) ?></td>
										<td width="200">
											<a href="<?php echo site_url('admin/budgets/edit/'.$budget->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/budgets/delete/'.$budget->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
