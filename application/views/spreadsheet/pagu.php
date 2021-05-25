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
		<!-- container --> 
		<section class="showcase">
			<div class="container">
                <div class="pb-2 mt-4 mb-2 border-bottom">
                    <h2>Import Data Pagu</h2>
                </div>
                <form action="<?php print site_url();?>/phpspreadsheet/uploadPagu" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    <div class="row padall">
                        <div class="col-lg-6 order-lg-1">
                            <input type="file" class="custom-file-input" id="validatedCustomFile" name="fileURL">
                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        </div>
                        <div class="col-lg-6 order-lg-2">
                            <button type="submit" name="import" class="float-right btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
			</div>
		</section>
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
