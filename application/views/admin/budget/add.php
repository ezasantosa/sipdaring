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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/budgets/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/budget/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Kecamatan*</label>
								<input class="form-control" list="districts" name="district" id="district">
								<datalist id="districts">
									<?php
                                        foreach ($districts as $district):
                                    ?>
										<option value="<?php echo $district->name;?>">
									<?php endforeach; ?>
								</datalist>
							</div>
							<div class="form-group">
								<label for="name">Dinkes*</label>
								<input class="form-control <?php echo form_error('dinkes') ? 'is-invalid':'' ?>"
								 type="text" name="dinkes" placeholder="Dinkes" />
								<div class="invalid-feedback">
									<?php echo form_error('dinkes') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disdik*</label>
								<input class="form-control <?php echo form_error('disdik') ? 'is-invalid':'' ?>"
								 type="text" name="disdik" placeholder="Disdik"/>
								<div class="invalid-feedback">
									<?php echo form_error('disdik') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disperkimtan*</label>
								<input class="form-control <?php echo form_error('disperkimtan') ? 'is-invalid':'' ?>"
								 type="text" name="disperkimtan" placeholder="Disperkimtan"/>
								<div class="invalid-feedback">
									<?php echo form_error('disperkimtan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">DLH*</label>
								<input class="form-control <?php echo form_error('dlh') ? 'is-invalid':'' ?>"
								 type="text" name="dlh" placeholder="DLH"/>
								<div class="invalid-feedback">
									<?php echo form_error('dlh') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">dputr*</label>
								<input class="form-control <?php echo form_error('dputr') ? 'is-invalid':'' ?>"
								 type="text" name="dputr" placeholder="DPUTR"/>
								<div class="invalid-feedback">
									<?php echo form_error('dputr') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disdamkar*</label>
								<input class="form-control <?php echo form_error('disdamkar') ? 'is-invalid':'' ?>"
								 type="text" name="disdamkar" placeholder="Disdamkar" />
								<div class="invalid-feedback">
									<?php echo form_error('disdamkar') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dinsos*</label>
								<input class="form-control <?php echo form_error('dinsos') ? 'is-invalid':'' ?>"
								 type="text" name="dinsos" placeholder="Dinsos"/>
								<div class="invalid-feedback">
									<?php echo form_error('dinsos') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Diskopukm*</label>
								<input class="form-control <?php echo form_error('diskopukm') ? 'is-invalid':'' ?>"
								 type="text" name="diskopukm" placeholder="Diskopukm" />
								<div class="invalid-feedback">
									<?php echo form_error('diskopukm') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disnaker*</label>
								<input class="form-control <?php echo form_error('disnaker') ? 'is-invalid':'' ?>"
								 type="text" name="disnaker" placeholder="Disnaker" />
								<div class="invalid-feedback">
									<?php echo form_error('disnaker') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dispakan*</label>
								<input class="form-control <?php echo form_error('dispakan') ? 'is-invalid':'' ?>"
								 type="text" name="dispakan" placeholder="Dispakan" />
								<div class="invalid-feedback">
									<?php echo form_error('dispakan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disparbud*</label>
								<input class="form-control <?php echo form_error('disparbud') ? 'is-invalid':'' ?>"
								 type="text" name="disparbud" placeholder="Disparbud"  />
								<div class="invalid-feedback">
									<?php echo form_error('disparbud') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dispora*</label>
								<input class="form-control <?php echo form_error('dispora') ? 'is-invalid':'' ?>"
								 type="text" name="dispora" placeholder="Dispora"/>
								<div class="invalid-feedback">
									<?php echo form_error('dispora') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Distan*</label>
								<input class="form-control <?php echo form_error('distan') ? 'is-invalid':'' ?>"
								 type="text" name="distan" placeholder="Distan"/>
								<div class="invalid-feedback">
									<?php echo form_error('distan') ?>
								</div>
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
