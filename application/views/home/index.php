<!-- CAROUSEL -->
<main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 posisi" src="assets/img/carousel/bumi.png" alt="tentang-pw">
                <div class="container">
                    <div class="carousel-caption text-left">
                        <h1 class="display-4">PLASTIC WORLD</h1>
                        <h4 class="mg-sm-btm">Tukar <span>sampahmu</span>, no <span>waste</span> anymore.</h4>
                        <p><a class="btn btn-lg btn-edit" href="about-us.html" role="button">Tentang PW</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 posisi" src="assets/img/carousel/hiu.png" alt="tukar-sampahmu">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 class="display-4">Sekarang saatnya kamu</h1>
                        <h4 class="mg-sm-btm">#SaveThePlanet</h4>
                        <p><a class="btn btn-lg btn-edit" href="masuk.html" role="button">Tukar sekarang</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100 posisi" src="assets/img/carousel/plastik.png" alt="event-seru">
                <div class="container">
                    <div class="carousel-caption text-right">
                        <h1 class="display-4">Keep the Sea <br> Plastic Free.</h1>
                        <h4 class="mg-sm-btm"><i class="fa fa-map-marker mr-2"></i>Pantai Senggigi. <br>July, 21 2020
                        </h4>
                        <p><a class="btn btn-lg btn-edit" href="event.html" role="button">Ikut Event</a></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <section class="event" id="event">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Event</h2>
                    <hr class="hr-edit mg-btm">
                </div>
            </div>
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
                <!-- d-lg-none kalo pengen hilang di window gede -->
                <div class="mx-auto wid-30 text-center"> <a href="<?= base_url('home/event/') ?>"
                        class="btn btn-edit wid">Lihat Lainnya</a> </div>
            </div>
        </div>
    </section>

    <!-- <section class="mulai workingspace mg-btm mg-top" id="mulai"> -->
    <section>
        <div class="fdb-block container-fluid partner-home p-5 mulai workingspace mg-btm mg-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <img src="assets/img/recycle.png" alt="section" class="img-fluid">
                    </div>
                    <div class="col-lg-6 pl-70">
                        <h3>Tukar plastik dapat <span>reward?</span></h3>
                        <p>#SavethePlanet<br></p>
                        <a href="<?= base_url('auth/daftar/') ?>" class="btn btn-edit">Daftar Sekarang Yuk!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->

    <section class="artikel" id="artikel">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Artikel</h2>
                    <hr class="hr-edit mg-btm">
                </div>
            </div>
            <div class="row">
                <?php foreach ($artikel as $e) : ?>
                <div class="col-lg-4">
                    <div class="card">
                        <img src="<?= base_url('assets/img/artikel/') . $e['gambar_artikel'] ?>" class="card-img-top"
                            width="50px" alt="event">

                        <div class="card-body">
                            <div class="jenis-artikel btn-edit"><?= date('d F Y', $e['date_created_artikel']) ?></div>
                            <p class="komunitas"><?= $e['nama_komunitas'] ?></p>
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
                <div class="mx-auto wid-30 text-center"> <a href="<?= base_url('home/artikel/') ?>"
                        class="btn btn-edit wid">Lihat Lainnya</a> </div>

            </div>
        </div>
    </section>

    <section id="facts" class="facts mg-top mg-btm" style="background: url('assets/img/carousel/sampah.png');">
        <!-- <div class="war"> -->
        <div class="container">
            <div class="row pd-20" id="timer">
                <div class="col-lg-3 col-md-6 col-xs-12 text-center">
                    <i class="fact-icon fas fa-user"></i>
                    <!-- <i class="fact-icon fa fa-user"></i> -->
                    <h3 class="timer" id="websites" data-to="<?= $masyarakat ?>" data-speed="1000"><?= $masyarakat ?>
                    </h3>
                    <h5 class="fact-title">Penukar</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 text-center">
                    <i class="fact-icon fas fa-users"></i>
                    <!-- <i class="fact-icon fa fa-rocket"></i> -->
                    <h3 class="timer" id="code" data-to="<?= $komunitas ?>" data-speed="1500"><?= $komunitas ?></h3>
                    <h5 class="fact-title">Komunitas</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 text-center">
                    <i class="fact-icon fas fa-house-user"></i>
                    <!-- <i class="fact-icon fa fa-coffee"></i> -->
                    <h3 class="timer" id="coffee" data-to="<?= $umkm ?>" data-speed="2000"><?= $umkm ?></h3>
                    <h5 class="fact-title">UMKM</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-xs-12 text-center">
                    <i class="fact-icon fas fa-recycle"></i>
                    <!-- <i class="fact-icon fa fa-heart"></i> -->
                    <h3 class="timer" id="emails" data-to="<?= $penukaran ?>" data-speed="2500"><?= $penukaran ?></h3>
                    <h5 class="fact-title">Penukaran</h5>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>

    <div id="map"></div>


    <script>
    function initMap() {

        // membuat objek untuk titik koordinat
        var lombok = {
            lat: -8.5830695,
            lng: 116.3202515
        };

        // membuat objek peta
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: lombok
        });

        // mebuat konten untuk info window
        var contentString = '<h2>Hello Dunia!</h2>';

        // membuat objek info window
        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            position: lombok
        });

        // membuat marker
        var marker = new google.maps.Marker({
            position: lombok,
            map: map,
            title: 'Pulau Lombok'
        });

        // event saat marker diklik
        marker.addListener('click', function() {
            // tampilkan info window di atas marker
            infowindow.open(map, marker);
        });

    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?callback=initMap">
    </script>

    <!--    <div class="container-fluid mg-btm">
     <div class="container">
      <div class="row">
        <div class="col">
          <div id="googleMap" style="width:100%;height:380px;"></div>
        </div>
    
      </div>
    </div>
   </div>  -->

    <!--   <script type="text/javascript">
    $('.timer').countTo({
      refreshInterval: 60,
      formatter: function(value, options) {
        return value.toFixed(options.decimals);
      },
    });
  </script> -->