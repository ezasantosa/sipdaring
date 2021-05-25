<?php
	$dinkes = 10000000;
	$disdik = 0;
	$disperkimtan = 10000000;
	$dlh = 10000000;
	$dputr = 10000000;
	$disdamkar = 10000000;
	$dinsos = 10000000;
	$diskopukm = 10000000;
	$disnaker = 10000000;
	$dispangkan = 10000000;
	$disparbud = 10000000;
	$dispora = 10000000;
	$distan = 10000000;

	$label =  array();
	$total = array();
	$labelDinas = array();
	$dataDinas = array();
	$max = 0;
	foreach ($overview as $view){
		$label[] = $view->name;
		$total[] = $view->total;

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
	}
	$max = max($total)+min($total);
 
?>
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
	<?php print_r(max($total));?>
	<script>
	window.onload = function() {
		Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
		Chart.defaults.global.defaultFontColor = '#858796';
		var ctx = document.getElementById("myBarChart");
		var myBarChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: <?php echo json_encode($label);?>,
			datasets: [{
			label: "Anggaran",
			backgroundColor: ["#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff',"#ff5733", '#1cc88a','#ffd133','#33caff'],
			hoverBackgroundColor: "#2e59d9",
			borderColor: "#4e73df",
			data: <?php echo json_encode($total);?>,
			}],
		},
		options: {
			maintainAspectRatio: false,
			layout: {
			padding: {
				left: 10,
				right: 25,
				top: 25,
				bottom: 0
			}
			},
			scales: {
			xAxes: [{
				time: {
				unit: 'month'
				},
				gridLines: {
				display: false,
				drawBorder: false
				},
				ticks: {
				maxTicksLimit: 6
				},
				maxBarThickness: 25,
			}],
			yAxes: [{
				ticks: {
				min: 0,
				max: <?php echo json_encode($max);?>,
				maxTicksLimit: 5,
				padding: 10,
				// Include a dollar sign in the ticks
				callback: function(value, index, values) {
					return 'Rp' + value;
				}
				},
				gridLines: {
				color: "rgb(234, 236, 244)",
				zeroLineColor: "rgb(234, 236, 244)",
				drawBorder: false,
				borderDash: [2],
				zeroLineBorderDash: [2]
				}
			}],
			},
			legend: {
			display: false
			},
			tooltips: {
			titleMarginBottom: 10,
			titleFontColor: '#6e707e',
			titleFontSize: 14,
			backgroundColor: "rgb(255,255,255)",
			bodyFontColor: "#858796",
			borderColor: '#dddfeb',
			borderWidth: 1,
			xPadding: 15,
			yPadding: 15,
			displayColors: false,
			caretPadding: 10,
			callbacks: {
				label: function(tooltipItem, chart) {
				var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
				return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
				}
			}
			},
		}
		});

		var pie = document.getElementById("myPieChart");
		var myPieChart = new Chart(pie, {
        type: 'doughnut',
        data: {
            labels: ["Dinkes", "Disdik", "Disperkimtan","DLH", "DPUTR", "Disdamkar","Dinsos", "Diskopukm", "Disnaker", "Dispangkan", "Disparbud","Dispora", "Distan"],
            datasets: [{
            data: [<?php echo $disdik;?>, <?php echo $disdik;?>, <?php echo $disperkimtan;?>, <?php echo $dlh;?>, <?php echo $dputr;?>,<?php echo $disdamkar;?>,<?php echo $dinsos;?>,<?php echo $diskopukm;?>,<?php echo $disnaker;?>,<?php echo $dispangkan;?>,<?php echo $disparbud;?>,<?php echo $dispora;?>,<?php echo $distan;?>],
            backgroundColor: ['#1cc88a','#ff5733','#ffd133','#33caff','#fc33ff','#1cc88a','#ff5733','#ffd133','#33caff','#fc33ff','#1cc88a','#ff5733','#ffd133','#33caff'],
            hoverBackgroundColor: "#2e59d9",
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
        });
	
	}

	</script>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">
	<?php $this->load->view("admin/_partials/sidebar.php") ?>
	<div id="content-wrapper">
		<div class="container-fluid">
			<br/>
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
					<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
					<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
							class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
				</div>
				<?php //$this->load->view("admin/_partials/breadcrumb.php") ?>
		
			<!-- Icon Cards-->
			<div class="row">
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Jumlah Usulan </div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo ($total_data);?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Total Pagu Usulan</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($total_anggaran);?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
										Anggaran Tertinggi </div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format(max($total));?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
							<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										Anggaran Terendah </div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format(min($total));?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Area Chart Example-->
			<!-- Content Row -->
			<div class="row">
				<div class="col-xl-12 col-md-6 mb-4">
					<!-- Bar Chart -->
					<div class="card shadow mb-8">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Pagu Anggaran</h6>
						</div>
						<div class="card-body">
							<div class="chart-bar">
								<canvas id="myBarChart"></canvas>
							</div>
							<hr>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-6 col-md-6 mb-4">
					<!-- Bar Chart -->
					<div class="card shadow mb-8">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Perangkat Daerah</h6>
						</div>
						<div class="card-body">
							<div class="chart-pie pt-12">
								<canvas id="myPieChart"></canvas>
							</div>
							<hr>
						</div>
					</div>
					<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
				</div>
				<div class="col-xl-6 col-md-6 mb-4">
					<!-- Bar Chart -->
					<div class="card shadow mb-8">
						<div class="card-body">
							<table>
								<tr>
									<th>Dinkes</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($dinkes);?></td>
								</tr>
								<tr>
									<th>Disdik</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($disdik);?></td>
								</tr>
								<tr>
									<th>Disperkimtan</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($disperkimtan);?></td>
								</tr>
								<tr>
									<th>DLH</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($dlh);?></td>
								</tr>
								<tr>
									<th>DPUTR</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($dputr);?></td>
								</tr>
								<tr>
									<th>Disdamkar</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($disdamkar);?></td>
								</tr>
								<tr>
									<th>Dinsos</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($dinsos);?></td>
								</tr>
								<tr>
									<th>Diskopukm</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($diskopukm);?></td>
								</tr>
								<tr>
									<th>Disnaker</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($disnaker);?></td>
								</tr>
								<tr>
									<th>Dispangkan</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($dispangkan);?></td>
								</tr>
								<tr>
									<th>Disparbud</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($disparbud);?></td>
								</tr>
								<tr>
									<th>Dispora</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($dispora);?></td>
								</tr>
								<tr>
									<th>Distan</th>
									<th> : </th>
									<td>Rp. <?php echo number_format($distan);?></td>
								</tr>
							</table>
							<br/>
						</div>
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
    
</body>
</html>
