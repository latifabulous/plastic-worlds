
  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid profiles bot" style="background-image: url(../../assets/img/jumbotron/jumbotron2.png); background-repeat: no-repeat;">
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
        <li class="breadcrumb-item active" aria-current="page">Komunitas</li>
      </ol>
    </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <section class="profile-komunitas" id="profile-komunitas">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <div class="card pd-20">
          <div class="foto-komunitas">
            <img src="<?= base_url('assets/img/profile/') . $komunitas['gambar_komunitas'] ?>" class="img-fluid" alt="komunitas-logo">
          </div>
          <h1 class="mg-sm-top"><?= $komunitas['nama_komunitas'] ?></h1>
          <p><?= $komunitas['desc_komunitas'] ?></p> 
          <hr>
          <ul class="social-links">
            <li>
              <p><i class="fa fa-map-marker mr-2 warna"></i><?= $komunitas['alamat_komunitas'] ?></p>  
            </li>
            <li>
              <p><i class="fa fa-user mr-2 warna"></i><?= $komunitas['pj_komunitas'] ?></p>
            </li>
            <li>
              <p><i class="fa fa-envelope mr-2 warna"></i><?= $komunitas['email_komunitas'] ?></p>  
            </li>
          </ul>
        </div>
        </div>


        <?php 
            $kom =  $this->db->get('komunitas', 3)->result_array();
         ?>

        <div class="col-lg-4">
          <div class="card pd-20">
          <h3>Komunitas lainnya</h3>
          <hr>
          <table>
            <?php foreach ($kom as $k):?>
            <tr>
              <td>
              <img src="<?= base_url('assets/img/profile/') . $k['gambar_komunitas'] ?>" class="img-thumbnail" width="70px" alt="komunitas">
              </td>
              <td>
              <h5><a class="warna"  href="<?= base_url('home/profileKomunitas/') . $k['id_komunitas']?>"><?= $k['nama_komunitas'] ?></a></h6>
              </td>
            </tr>
          <?php endforeach; ?>
          </table>
          </div>
        </div>
      </div>
    </div>
  </section>
