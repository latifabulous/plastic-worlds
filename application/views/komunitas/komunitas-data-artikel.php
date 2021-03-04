    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-newspaper mr-3 warna"></i></i><?= $judul; ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold warna"></h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <a href="<?= base_url('post') ?>" class="btn btn-edit mb-3">Tambah Artikel</a>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Judul</th>
                      <th>Gambar</th>
                      <th>Deskripsi Singkat</th>
                      <th>Dibuat</th>
                      <th>Aksi</th>
                      <th>Isi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($artikel as $artikels) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $artikels['judul_artikel'] ?></td>
                      <td><img src="<?= base_url('assets/img/artikel/') . $artikels['gambar_artikel'] ?>" style="width:50px" alt="gambar-artikel"></td>
                      <td><?= $artikels['desc_artikel'] ?></td>
                      <td><?= $artikels['date_created_artikel'] ?></td>
                      <td>
                        <a href="<?= base_url('komunitas/ubahArtikel') ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></a>  
                        <a href="<?= base_url('post/hapusArtikel/') . $artikels['id_artikel']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                      </td>
                      <td style="width: 50px"><?= $artikels['isi_artikel'] ?></td>
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
