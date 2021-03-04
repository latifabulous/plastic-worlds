
  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid profiles bot" style="background-image: url(../../assets/img/jumbotron/jumbotron5.png); background-repeat: no-repeat;">
    <div class="container">
    </div>
  </div>
  <!-- AKHIT JUMBOTRON -->
  
  <!-- BREADCUMBR -->
  
  <nav aria-label="breadcrumb">
    <div class="container">
      <div class="">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="beranda.html">Beranda</a></li>
        <li class="breadcrumb-item active" aria-current="page">UMKM</li>
      </ol>
    </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <section class="profile-umkm" id="profile-umkm">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <div class="card pd-20">
          <div class="foto-umkm">
            <img src="<?= base_url('assets/img/profile/') . $umkm['gambar_umkm'] ?>" class="img-fluid" alt="umkm-logo">
          </div>
          <h1 class="mg-sm-top"><?= $umkm['nama_umkm'] ?></h1>
          <p><?= $umkm['desc_umkm'] ?></p> 
          <hr>
          <ul class="social-links">
            <li>
              <p><i class="fa fa-map-marker mr-2 warna"></i><?= $umkm['alamat_umkm'] ?></p>  
            </li>
            <li>
              <p><i class="fa fa-user mr-2 warna"></i><?= $umkm['pj_umkm'] ?></p>
            </li>
            <li>
              <p><i class="fa fa-envelope mr-2 warna"></i><?= $umkm['email_umkm'] ?></p>  
            </li>
          </ul>
        </div>
        </div>


        <?php 
            $ukm =  $this->db->get('umkm', 3)->result_array();
         ?>

        <div class="col-lg-4">
          <div class="card pd-20">
          <h3>UMKM lainnya</h3>
          <hr>
          <table>
            <?php foreach ($ukm as $uk):?>
            <tr>
              <td>
              <img src="<?= base_url('assets/img/profile/') . $uk['gambar_umkm'] ?>" class="img-thumbnail" width="70px" alt="umkm">
              </td>
              <td>
              <h5><a class="warna"  href="<?= base_url('home/profileUmkm/') . $uk['id_umkm']?>"><?= $uk['nama_umkm'] ?></a></h6>
              </td>
            </tr>
          <?php endforeach; ?>
          </table>
          </div>
        </div>
      </div>
    </div>
  </section>
