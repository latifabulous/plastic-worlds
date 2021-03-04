    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-user mr-3 warna"></i></i><?= $judul; ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold warna"></h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <a href="<?= base_url('plastik/tambahPlastik') ?>" class="btn btn-edit mb-3">Tambah Plastik</a>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Gambar</th>
                      <th>Jenis</th>
                      <th>Poin</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($plastik as $p) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><img src="<?= base_url('assets/img/plastik/') . $p['gambar_plastik'] ?>" style="width:50px" alt="gambar-artikel"></td>
                      <td><?= $p['jenis_plastik'] ?></td>
                      <td><?= $p['poin'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('admin/detailPlastik/') . $p['id_plastik']?>" class="btn btn-primary"><i class="fas fa-fw fa-search-plus"></i></a>  
                        <a href="<?= base_url('plastik/ubahPlastik') ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></a>  
                        <a href="<?= base_url('plastik/hapusPlastik/') . $p['id_plastik']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
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
