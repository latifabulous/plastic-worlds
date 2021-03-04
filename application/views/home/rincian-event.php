
  <div class="jumbotron jumbotron-fluid profiles bot" style="background-image: url(../../assets/img/jumbotron/jumbotron3.png); background-repeat: no-repeat;">
    <div class="container">
    </div>
  </div>

  
  <div class="event">
    <div class="container">
      <div class="row mg-lg-btm">
        <div class="col-lg-10">
          <div class="row">
            <div class="col-lg-3 col-sm-5 col-md-4 mb-sm-7 pl-minus">
              <div class="wrapper-kelas rounded minus-top logo-center white-bg wrapper-kelas-sm">
                <img src="<?= base_url('assets/img/event/') . $event['gambar_event'] ?>" class="img-fluid img-thumbnail" alt="event">
              </div>
            </div>
            <div class="col-lg-9 col-sm-7 col-md-8">
              <p class="komunitas mg-lg-btm"><?= $event['nama_event']; ?></p>
              <h3 class="mg-top-5"><?= $event['nama_event'] ?></h3>
            </div>
          </div>
        </div>
        <div class="col-lg-2 text-lg-right">
          <p>Terbuka Hingga:</p>
          <p class="btn btn-edit"><?= $event['tanggal_event'] ?></p>

        </div>
      </div>
    </div>
  </div>
    
  <section class="desk-event">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Deskripsi Event</h2>
          <hr>
          <p><?= $event['desc_event'] ?></p>

          <form action="<?= base_url('home/ikutEvent') ?>" method="post">
            <input type="hidden" name="id_event" value="<?= $event['id_event'] ?>">
            <button type="submit" class="btn btn-edit mg-sm-top mg-btm">Ikut Event</button>
<!--             <a href="" class="btn btn-edit mg-sm-top mg-btm">Ikut Event</a> -->
          </form>
        </div>
        <div class="col-lg-4 text-lg-right mt-80">
          <p>Sisa Kuota:</p>
          <p class=""><strong><?= $event['kuota'] ?> Peserta</strong></p>
          <p><i class="fa fa-clock mr-2 warna mt-4"></i><?= $event['waktu_event'] ?></p>
          <p><i class="fa fa-map-marker mr-2 warna"></i><?= $event['tempat_event'] ?></p>
        </div>
      </div>
    </div>
  </section>

    <?php 
      $query = "SELECT `event`.*,  `komunitas`.`nama_komunitas`
                  FROM `event` JOIN `komunitas`
                    ON `event`.`id_komunitas` = `komunitas`.`id_komunitas`";
      $events = $this->db->query($query)->result_array();
    ?>
    
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="text-center">Event Lainnya</h2>
          <hr class="hr-edit2 mg-btm">
        </div>
      </div>
      <div class="owl-carousel owl-theme">
        <?php foreach($events as $e): ?>
        <div class="ml-2 mr-2">
            <div class="card">
            <img src="<?= base_url('assets/img/event/') . $event['gambar_event'] ?>" class="card-img-top" alt="event">
            <div class="tanggal btn-edit"><?= $e['tanggal_event'] ?></div>
            <div class="card-body">
              <p class="komunitas"><?= $e['nama_komunitas'] ?></p>
              <h4 class="nama-event"><?= $e['nama_event'] ?></h4>
              <p class="card-text"><?= $e['desc_event'] ?></p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt warna mr-3"></i></a>
                </div>
                <div class="pr-15">
                  <a href="<?= base_url('home/event/') . $e['id_event']?>" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

  <script>
  $('.owl-carousel').owlCarousel ({
    autoplay: true,
    autoplayHoverPause: true,
      items: 3,
    nav: true,
    dots: true,
    loop: true,

  });
</script>
