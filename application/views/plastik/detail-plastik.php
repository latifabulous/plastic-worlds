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
        <li class="breadcrumb-item active" aria-current="page">Plastik</li>
      </ol>
    </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <section class="rincian-plastik" id="rincian-plastik">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card pd-20">
          <div class="foto-umkm mg-btm">
            <img src="<?= base_url('assets/img/plastik/') . $plastik['gambar_plastik'] ?>" class="img-fluid" alt="plastik">
          </div>
          <h1><?= $plastik['jenis_plastik']; ?></h1>
          <hr>
          <p><?= $plastik['detail_plastik']; ?></p> 
        </div>
        </div>
      </div>
    </div>
  </section>