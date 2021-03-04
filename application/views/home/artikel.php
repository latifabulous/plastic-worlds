  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid bot"
      style="background-image: url(../../assets/img/jumbotron/jumbotron4.png); background-repeat: no-repeat;">
      <div class="container">
          <h1 class="display-4 text-shadow">Dunia darurat sampah <span>plastik.</span><br>Yuk edukasi diri masalah<span>
                  plastik!</span></h1>
          <div class="row justify-content-center">
              <form class="form-inline input-group cari my-2 my-lg-0" action="<?= base_url('home/cariArtikel/')  ?>"
                  method="post">
                  <input class="form-control mr-sm-2" type="search" placeholder="Cari artikel" name="keyword">
                  <!-- <input type="submit" class="btn btn-edit my-2 my-sm-0" value="Cari" name="cari" id="cari"> -->
                  <button class="btn btn-edit my-2 my-sm-0" type="submit">Cari</button>
              </form>
          </div>
      </div>
  </div>

  <!-- AKHIT JUMBOTRON -->

  <!-- BREADCUMBR -->

  <nav aria-label="breadcrumb" class="mg-btm">
      <div class="container">
          <div class="">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="beranda.html">Beranda</a></li>
                  <li class="breadcrumb-item"><a href="komunitas.html">Komunitas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Artikel</li>
              </ol>
          </div>
      </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <!-- KATEGORI -->


  <section class="artikel" id="artikel">
      <div class="container">
          <div class="row">
              <?php foreach ($artikel as $e) : ?>
              <div class="col-lg-4">
                  <div class="card">
                      <img src="<?= base_url('assets/img/artikel/') . $e['gambar_artikel'] ?>" class="card-img-top"
                          width="50px" alt="event">

                      <div class="card-body">
                          <div class="jenis-artikel btn-edit"><?= date('d F Y', $e['date_created_artikel']) ?></div>
                          <!-- <p class="komunitas"><?= $e['nama_komunitas'] ?></p> -->
                          <h4 class="judul-artikel" style="min-height: 100px;"><?= $e['judul_artikel'] ?></h4>
                          <p class="card-text" style="min-height: 50px;"><?= $e['desc_artikel'] ?></p>
                          <hr>
                          <div class="row">
                              <div class="mr-auto text-left pl-minus">
                                  <a class="nav-link warna" href="share.html"><i
                                          class="fas fa-share-alt mr-3 warna"></i></a>
                              </div>
                              <div class="pr-15">
                                  <a href="<?= base_url('home/detailArtikel/') . $e['id_artikel'] ?>"
                                      class="btn btn-edit">Selengkapnya</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php endforeach;  ?>
          </div>
      </div>
  </section>