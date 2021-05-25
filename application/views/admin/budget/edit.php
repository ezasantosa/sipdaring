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

						<a href="<?php echo site_url('admin/budgets/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/budget/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<input type="hidden" name="id" value="<?php echo $budget->id?>" />

							<div class="form-group">
								<label for="name">Kecamatan*</label>
								<input class="form-control" list="districts" name="district" id="district" value="<?php echo $budget->kecamatan ?>">
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
								 type="text" name="dinkes" placeholder="Dinkes" value="<?php echo $budget->dinkes ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('dinkes') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disdik*</label>
								<input class="form-control <?php echo form_error('disdik') ? 'is-invalid':'' ?>"
								 type="text" name="disdik" placeholder="Disdik" value="<?php echo $budget->disdik ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('disdik') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disperkimtan*</label>
								<input class="form-control <?php echo form_error('disperkimtan') ? 'is-invalid':'' ?>"
								 type="text" name="disperkimtan" placeholder="Disperkimtan" value="<?php echo $budget->disperkimtan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('disperkimtan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">DLH*</label>
								<input class="form-control <?php echo form_error('dlh') ? 'is-invalid':'' ?>"
								 type="text" name="dlh" placeholder="DLH" value="<?php echo $budget->dlh ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('dlh') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">dputr*</label>
								<input class="form-control <?php echo form_error('dputr') ? 'is-invalid':'' ?>"
								 type="text" name="dputr" placeholder="DPUTR" value="<?php echo $budget->dputr ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('dputr') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disdamkar*</label>
								<input class="form-control <?php echo form_error('disdamkar') ? 'is-invalid':'' ?>"
								 type="text" name="disdamkar" placeholder="Disdamkar" value="<?php echo $budget->disdamkar ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('disdamkar') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dinsos*</label>
								<input class="form-control <?php echo form_error('dinsos') ? 'is-invalid':'' ?>"
								 type="text" name="dinsos" placeholder="Dinsos" value="<?php echo $budget->dinsos ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('dinsos') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Diskopukm*</label>
								<input class="form-control <?php echo form_error('diskopukm') ? 'is-invalid':'' ?>"
								 type="text" name="diskopukm" placeholder="Diskopukm" value="<?php echo $budget->diskopukm ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('diskopukm') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disnaker*</label>
								<input class="form-control <?php echo form_error('disnaker') ? 'is-invalid':'' ?>"
								 type="text" name="disnaker" placeholder="Disnaker" value="<?php echo $budget->disnaker ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('disnaker') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dispakan*</label>
								<input class="form-control <?php echo form_error('dispakan') ? 'is-invalid':'' ?>"
								 type="text" name="dispakan" placeholder="Dispakan" value="<?php echo $budget->dispakan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('dispakan') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Disparbud*</label>
								<input class="form-control <?php echo form_error('disparbud') ? 'is-invalid':'' ?>"
								 type="text" name="disparbud" placeholder="Disparbud" value="<?php echo $budget->disparbud ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('disparbud') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Dispora*</label>
								<input class="form-control <?php echo form_error('dispora') ? 'is-invalid':'' ?>"
								 type="text" name="dispora" placeholder="Dispora" value="<?php echo $budget->dispora ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('dispora') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="name">Distan*</label>
								<input class="form-control <?php echo form_error('distan') ? 'is-invalid':'' ?>"
								 type="text" name="distan" placeholder="Distan" value="<?php echo $budget->distan ?>" />
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
