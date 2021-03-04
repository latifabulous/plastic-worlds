  <!-- JUMBOTRON -->




  <div class="jumbotron jumbotron-fluid profiles bot"
      style="background-image: url(../../assets/img/jumbotron/jumbotron3.png); background-repeat: no-repeat;">
      <div class="container">
          <h1 class="display-4 text-shadow">Dunia darurat sampah <span>plastik.</span><br>Ikuti berbagai macam event
              yang<span> seru!</span></h1>
          <div class="row justify-content-center">
              <form class="form-inline input-group cari my-2 my-lg-0" action="<?= base_url('home/cariArtikel')  ?>"
                  method="post">
                  <input class="form-control mr-sm-2" type="search" placeholder="Cari event" name="keyword">
                  <!-- <input type="submit" class="btn btn-edit my-2 my-sm-0" value="Cari" name="cari" id="cari"> -->
                  <button class="btn btn-edit my-2 my-sm-0" type="submit">Cari</button>
              </form>
          </div>
      </div>
  </div>


  <!--  -->
  <!-- AKHIT JUMBOTRON -->

  <!-- BREADCUMBR -->

  <nav aria-label="breadcrumb" class="mg-btm">
      <div class="container">
          <div class="">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="beranda.html">Beranda</a></li>
                  <li class="breadcrumb-item"><a href="komunitas.html">Komunitas</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Event</li>
              </ol>
          </div>
      </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <section class="event" id="event">
      <div class="container">
          <?= $this->session->flashdata('message'); ?>

          <div class="row">
              <?php foreach ($event as $e) : ?>
              <div class="col-lg-4">
                  <div class="card">
                      <img src="<?= base_url('assets/img/event/') . $e['gambar_event'] ?>" class="card-img-top"
                          width="50px" alt="event">
                      <div class="tanggal btn-edit"><?= $e['tanggal_event'] ?></div>
                      <div class="card-body">
                          <p class="komunitas" style="min-height: 100px;"><?= $e['nama_komunitas'] ?></p>
                          <h4 class="nama-event"><?= $e['nama_event'] ?></h4>
                          <p class="card-text" style="min-height: 50px;"><?= $e['desc_event'] ?></p>
                          <hr>
                          <div class="row">
                              <div class="mr-auto text-left pl-minus">
                                  <a class="nav-link warna" href="share.html"><i
                                          class="fas fa-share-alt mr-3 warna"></i></a>
                              </div>
                              <div class="pr-15">
                                  <a href="<?= base_url('home/detailEvent/') . $e['id_event'] ?>"
                                      class="btn btn-edit">Selengkapnya</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
      </div>
  </section>