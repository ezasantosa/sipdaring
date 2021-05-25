<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

	<?php $this->load->view("admin/_partials/sidebar.php") ?>
 <!-- container --> 
  <section class="showcase">
    <div class="container">
      <div class="pb-2 mt-4 mb-2 border-bottom">
        <h2>Import Data Pagu</h2>
      </div>
      <div class="row padall border-bottom">  
      <div class="col-lg-12">
      <div class="float-right">  
          <a href="<?php echo site_url('phpspreadsheet/pagu') ?>" class="btn btn-info btn-sm"><i class="fa fa-file-upload"></i> Back to Upload</a>
        </div> 
      </div>
      </div>
      <div class="row padall">
        
        <table class="table table-striped">
          <thead>
            <tr class="table-primary">
              <th scope="col">No</th>
              <th scope="col">Kecamatan</th>
              <th scope="col">Dinkes</th>
              <th scope="col">Disdik</th>
              <th scope="col">Disperkimtan</th>
              <th scope="col">DLH</th>
              <th scope="col">DPUTR</th>
              <th scope="col">Disdamkar</th>
              <th scope="col">Dinsos</th>
              <th scope="col">DiskopUKM</th>
              <th scope="col">Disnaker</th>
              <th scope="col">Dispakan</th>
              <th scope="col">Disparbud</th>
              <th scope="col">Dispora</th>
              <th scope="col">Distan</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                $i = 0;
                foreach($dataInfo as $key=>$element) {
                $i++;
            ?>
            <tr>
              <td><?php print $i;?></td>
              <td><?php print $element['kecamatan'];?></td>
              <td><?php print number_format($element['dinkes']);?></td>
              <td><?php print number_format($element['disdik']);?></td>
              <td><?php print number_format($element['disperkimtan']);?></td>
              <td><?php print number_format($element['dlh']);?></td>
              <td><?php print number_format($element['dputr']);?></td>
              <td><?php print number_format($element['disdamkar']);?></td>
              <td><?php print number_format($element['dinsos']);?></td>
              <td><?php print number_format($element['diskopukm']);?></td>
              <td><?php print number_format($element['disnaker']);?></td>
              <td><?php print number_format($element['dispakan']);?></td>
              <td><?php print number_format($element['disparbud']);?></td>
              <td><?php print number_format($element['dispora']);?></td>
              <td><?php print number_format($element['distan']);?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </section>
</div>
