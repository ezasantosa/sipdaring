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
					<h2>Import Data Usulan</h2>
				</div>
			<!-- <div class="row padall border-bottom">  
				<div class="col-lg-12">
					<div class="float-right">  
					<a href="<?php print site_url();?>assets/uploads/sample-xlsx.xlsx" class="btn btn-info btn-sm"><i class="fa fa-file-excel"></i> Sample .XLSX</a>
					<a href="<?php print site_url();?>assets/uploads/sample-xls.xls" class="btn btn-info btn-sm"><i class="fa fa-file-excel"></i> Sample .XLS</a>
					<a href="<?php print site_url();?>assets/uploads/sample-csv.csv" class="btn btn-info btn-sm" target="_blank" ><i class="fa fa-file-csv"></i> Sample .CSV</a>
					</div> 
				</div>
			</div> -->
			<form action="<?php print site_url();?>/phpspreadsheet/upload" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
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
