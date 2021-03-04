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

  <!-- DATA KOMUNITAS -->

  <section class="data" id="data">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h1 class="mg-sm-btm">Data UMKM</h1>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Penanggung Jawab</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($umkm as $u) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><a class="warna" href="<?= base_url('home/profileUmkm/') . $u['id_umkm']?>"><?= $u['nama_umkm'] ?></a></td>
                      <td><?= $u['alamat_umkm'] ?></td>
                      <td><?= $u['pj_umkm'] ?></td>
                    </tr>
                    <?php $i++ ?>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>