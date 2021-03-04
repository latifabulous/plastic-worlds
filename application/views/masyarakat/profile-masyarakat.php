  <!-- JUMBOTRON -->

  <div class="jumbotron jumbotron-fluid bot"
      style="background-image: url(../assets/img/jumbotron/jumbotron6.png); background-repeat: no-repeat;">
      <div class="container">

      </div>
  </div>

  <div class="profile">
      <div class="container">
          <div class="row mg-lg-btm">
              <div class="col-lg-8">
                  <div class="row">
                      <div class="col-lg-3 col-sm-5 col-md-4 mb-sm-7 pl-minus">
                          <div class="wrapper-kelas rounded minus-top logo-center white-bg wrapper-kelas-sm">
                              <img src="<?= base_url('assets/img/profile/') . $masyarakat['gambar_masyarakat'] ?>"
                                  class="img-fluid img-thumbnail" alt="">
                          </div>
                      </div>
                      <div class="col-lg-9 col-sm-7 col-md-8">
                          <h3><?= $masyarakat['nama_masyarakat'] ?></h3>
                          <p class="text-muted">
                              <!-- <i class="fa fa-map-marker mr-2 warna"></i> -->Bergabung sejak
                              <?= date('d F Y', $masyarakat['date_created_masyarakat']); ?></p>
                          <p><i class="fa fa-map-marker mr-2 warna"></i><?= $masyarakat['alamat_masyarakat'] ?></p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 text-lg-right">
                  <a href="<?= base_url('Plastik/tukarPlastik') ?>" class="btn btn-edit"><i
                          class="fas fa-exchange-alt mr-2"></i></i>Tukar Plastik</a>
                  <a href="<?= base_url('reward') ?>" class="btn btn-edit"><i class="fas fa-exchange-alt mr-2"></i>Tukar
                      Poin</a>
              </div>

          </div>
      </div>
  </div>

  <section class="detail" id="detail">
      <div class="container">
          <div class="row color">
              <div class="col-lg-4">
                  <div class="card btn-edit">
                      <div class="card-body">
                          <div class="card-body-icon font-size">
                              <i class="fas fa-coins mr-2"></i>
                          </div>
                          <h5><b>JUMLAH POIN</h5></b>
                          <div class="display-4"><?= $masyarakat['poin'] ?></div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="card btn-edit">
                      <div class="card-body">
                          <div class="card-body-icon font-size">
                              <i class="fas fa-recycle mr-2"></i>
                          </div>
                          <h5><b>JUMLAH PENUKARAN</h5></b>
                          <div class="display-4">
                              <a href="<?= base_url('masyarakat/detailPenukaran') ?>"><?= $tukar ?></a>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4">
                  <div class="card btn-edit">
                      <div class="card-body">
                          <div class="card-body-icon font-size">
                              <i class="fas fa-certificate mr-2"></i>
                          </div>
                          <h5><b>EVENT TELAH DIIKUTI</h5></b>
                          <div class="display-4"><?= $join ?></div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <section class="mg-lg-top">

  </section>