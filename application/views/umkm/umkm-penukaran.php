    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-fw fa-calendar-alt mr-3 warna"></i></i><?= $judul; ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold warna"></h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <a href="<?= base_url('umkm/tambahpenukaran') ?>" class="btn btn-edit mb-3">Tambah penukaran</a>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr class="text-center">
                      <th>No.</th>
                      <!-- <th>Nama</th> -->
<!--                       <th>Gambar</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Deskripsi</th> -->
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($penukaran as $p) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $p['pvc'] ?></td>
                      <td><?= $p['pet'] ?></td>
                      <td><?= $p['waktu_penukaran'] ?></td>
                      <td><?= $p['desc_penukaran'] ?></td>
                      <td>
                        <a href="<?= base_url('umkm/ubahpenukaran') ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></a>  
                        <a href="<?= base_url('umkm/hapuspenukaran/') . $p['id_penukaran']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php $i++ ?>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <p>Copyright © <?= date('Y') ?> - Plastic World. All rights reserved.</p>
    </div>
  </div>
</footer>
