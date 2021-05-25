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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/subdistricts/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url("admin/subdistrict/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $subdistrict->id?>" />

							<div class="form-group">
								<label for="name">Desa/Kelurahan*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="name" placeholder="subdistrict name" value="<?php echo $subdistrict->name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Kepala Desa/Kelurahan*</label>
								<input class="form-control <?php echo form_error('head_village') ? 'is-invalid':'' ?>"
								 type="text" name="head_village" placeholder=" head_village" value="<?php echo $subdistrict->head_village ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('head_village') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Kecamatan*</label>
								<input class="form-control" list="districts" name="district" id="district" value="<?php echo $subdistrict->district ?>">
								<datalist id="districts">
									<?php
                                        foreach ($districts as $district):
                                    ?>
										<option value="<?php echo $district->name;?>">
									<?php endforeach; ?>
								</datalist>
							</div>
							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
