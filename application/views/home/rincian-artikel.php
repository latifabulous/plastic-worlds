  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid bot" style="background-image: url(../../assets/img/jumbotron/jumbotron4.png); background-repeat: no-repeat;">
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
        <li class="breadcrumb-item"><a href="beranda.html">Komunitas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Artikel</li>
      </ol>
    </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->
    <?php 
      $query = "SELECT `artikel`.*,  `komunitas`.`nama_komunitas`
                  FROM `artikel` JOIN `komunitas`
                    ON `artikel`.`id_komunitas` = `komunitas`.`id_komunitas`";
      $artikels = $this->db->query($query)->row_array();
    ?>

  <section class="rincian-artikel" id="rincian-artikel">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card pd-20">
          <div class="foto-umkm mg-btm">
            <img src="<?= base_url('assets/img/artikel/') . $artikel['gambar_artikel'] ?>" class="img-fluid" alt="artikel">
          </div>
          <a href="profile-komunitas.html" class="warna"><i class="fab fa-creative-commons mr-1"></i><?= $artikels['nama_komunitas']; ?></a>
          <h1><?= $artikel['judul_artikel']; ?></h1>
          <hr>
          <p><?= $artikel['isi_artikel']; ?></p> 
        </div>
        </div>

        <?php 
            $artik =  $this->db->get('artikel', 3)->result_array();
         ?>
        <div class="col-lg-4">
          <div class="card pd-20">
          <h3>Artikel lainnya</h3>
          <hr>
          <table>
            <?php foreach ($artik as $el):?>
            <tr>
              <td>
              <img src="<?= base_url('assets/img/artikel/') . $el['gambar_artikel'] ?>" class="img-thumbnail" width="100px" alt="artikel">
              </td>
              <td>
              <h5 style=""><a href="<?= base_url('home/detailArtikel/') . $el['id_artikel']?>"><?= $el['judul_artikel'] ?></a></h6>
              </td>
            </tr>
          <?php endforeach; ?>
          </table>
          </div>
        </div>
      </div>
    </div>
  </section>