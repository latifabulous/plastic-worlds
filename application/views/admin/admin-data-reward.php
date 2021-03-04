    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-fw fa-house-user mr-2 warna"></i></i><?= $judul ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold warna"></h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <a href="" class="btn btn-edit mb-3 tombolTambahReward" data-toggle="modal" data-target="#tambahReward">Tambah Reward</a>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Poin</th>
                      <th>Gambar</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($reward as $r) : ?>
                    <tr class="text-center">
                      <td><?= $i; ?></td>
                      <td><?= $r['nama_reward'] ?></td>
                      <td><?= $r['jumlah_poin'] ?></td>
                      <td><img src="<?= base_url('assets/img/reward/') . $r['gambar_reward'] ?>" style="width: 70px" alt="komunitas"></td>
                      <td><?= $r['is_active_reward'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('admin/detailReward/') . $r['id_reward']?>" class="btn btn-primary"><i class="fas fa-fw fa-search-plus"></i></a>  

                        <a href="<?= base_url('admin/editReward/') . $r['id_reward']?>" class="btn btn-success tampilModalReward" data-toggle="modal" data-target="#tambahReward" data-id="<?= $r['id_reward'] ?>"><i class="fas fa-fw fa-edit"></i></a>  

                        <a href="<?= base_url('admin/hapusReward/') . $r['id_reward']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>       
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

<!-- Modal -->
<div class="modal fade" id="tambahReward" tabindex="-1" role="dialog" aria-labelledby="tambahReward" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahRewardLabel">Tambah Reward</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body edits">
        <form action="<?= base_url('admin/tambahReward') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id" name="id">

        
          <!-- <input type="hidden" id="id" name="id"> -->
          <div class="form-group">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Reward" value="<?= set_value('nama'); ?>">
            <?= form_error('nama', '<small class="text-danger">', ' </small>'); ?>
          </div>
          <div class="form-group">
            <input type="number" name="poin" class="form-control" id="poin" placeholder="Jumlah Poin" value="<?= set_value('poin'); ?>">
            <?= form_error('poin', '<small class="text-danger">', ' </small>'); ?>
          </div>
          <div class="form-group">
            <input type="file" class="form-control-file" id="gambar" name="gambar" >
            <?= form_error('gambar', '<small class="text-danger">', ' </small>'); ?>
          </div>
          <div class="form-group">
            <select name="status" id="status" class="form-control" value="<?= set_value('status'); ?>">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
          </div>
          <div class="modal-footer mt-3">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-edit">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

      <!-- Footer -->
       <footer class="sticky-footer bg-white">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <p>Copyright © <?= date('Y') ?> - Plastic World. All rights reserved.</p>
            </div>
          </div>
        </footer>



