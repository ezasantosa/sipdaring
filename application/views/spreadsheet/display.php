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
        <h2>Import Data Usulan</h2>
      </div>
      <div class="row padall border-bottom">  
      <div class="col-lg-12">
      <div class="float-right">  
          <a href="<?php echo site_url('phpspreadsheet') ?>" class="btn btn-info btn-sm"><i class="fa fa-file-upload"></i> Back to Upload</a>
        </div> 
      </div>
      </div>
      <div class="row padall">
        
        <table class="table table-striped">
          <thead>
            <tr class="table-primary">
              <th scope="col">No</th>
              <th scope="col">Tanggal Usul</th>
              <th scope="col">Pengusul</th>
              <th scope="col">Profil</th>
              <th scope="col">Urusan</th>
              <th scope="col">Usulan</th>
              <th scope="col">Permasalahan</th>
              <th scope="col">Alamat</th>
              <th scope="col">OPD Tujuan</th>
              <th scope="col">Rekomendasi Mitra Bappeda</th>
              <th scope="col">Kategori Usulan</th>
              <th scope="col">Koefisien</th>
              <th scope="col">Rekomendasi Desa</th>
              <th scope="col">Rekomendasi Kecamatan</th>
              <th scope="col">Rekomendasi SKPD</th>
              <th scope="col">Rekomendasi TAPD</th>
              <th scope="col">Status</th>
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
              <td><?php print $element['tgl_usul'];?></td>
              <td><?php print $element['pengusul'];?></td>
              <td><?php print $element['profil'];?></td>
              <td><?php print $element['urusan'];?></td>
              <td><?php print $element['usulan'];?></td>
              <td><?php print $element['permasalahan'];?></td>
              <td><?php print $element['alamat'];?></td>
              <td><?php print $element['opd_tujuan'];?></td>
              <td><?php print $element['rekomendasi_mitra_bappeda'];?></td>
              <td><?php print $element['kategori_usulan'];?></td>
              <td><?php print $element['koefisien'];?></td>
              <td><?php print $element['rekomendasi_desa'];?></td>
              <td><?php print $element['rekomendasi_kecamatan'];?></td>
              <td><?php print $element['rekomendasi_skpd'];?></td>
              <td><?php print $element['rekomendasi_tapd'];?></td>
              <td><?php print $element['status'];?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        
      </div>
    </div>
  </section>
</div>
