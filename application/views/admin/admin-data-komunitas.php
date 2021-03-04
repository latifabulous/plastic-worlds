    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-fw fa-users mr-2 warna"></i></i><?= $judul ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold warna"></h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <a href="" class="btn btn-edit mb-3" data-toggle="modal" data-target="#tambahKomunitas">Tambah Komunitas</a>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Gambar</th>
                      <th>PJ</th>
                      <th>Aksi</th>
                      <!-- <th></th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($komunitas as $kom) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $kom['nama_komunitas'] ?></td>
                      <td><?= $kom['username_komunitas'] ?></td>
                      <td><?= $kom['email_komunitas'] ?></td>
                      <td><img src="<?= base_url('assets/img/profile/') . $kom['gambar_komunitas'] ?>" style="width: 70px" alt="komunitas"></td>
                      <td><?= $kom['pj_komunitas'] ?></td>
                      <td class="text-center">
                        <a href="<?= base_url('admin/detailKom/') . $kom['id_komunitas']?>" class="btn btn-primary"><i class="fas fa-fw fa-search-plus"></i></a>  
                        <a href="<?= base_url('admin/editKom/') . $kom['id_komunitas']?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></a>  
                        <a href="<?= base_url('admin/hapusKom/') . $kom['id_komunitas']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>       
                      </td>
<!--                       <td>
                      </td>
                      <td></td> -->
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
<div class="modal fade" id="tambahKomunitas" tabindex="-1" role="dialog" aria-labelledby="tambahKomunitas" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahKomunitasLabel">Tambah Masyarakat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/tambahKom') ?>" method="post">
          <input type="hidden" id="id" name="id">
          <div class="form-group">
            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
          </div>
          <div class="form-group">
            <input type="text" name="uname" class="form-control" id="uname" placeholder="Username" value="<?= set_value('uname'); ?>">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
          </div>
          <div class="form-group">
            <input type="text" name="pj" class="form-control" id="pj" placeholder="Penanggung Jawab" value="<?= set_value('pj'); ?>">
          </div>
          <div class="form-group">
            <input type="text" name="notelp" class="form-control" id="notelp" placeholder="Nomor Handphone" value="<?= set_value('notelp'); ?>">
          </div>
          <div class="form-group">
            <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
          </div>
              <div class="modal-footer">
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