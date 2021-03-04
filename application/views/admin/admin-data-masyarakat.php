    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-fw fa-user mr-2 warna"></i></i><?= $judul ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold warna"></h6>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('message'); ?>
              <a href="" class="btn btn-edit mb-3" data-toggle="modal" data-target="#tambahMasyarakat">Tambah Masyarakat</a>

              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="btn-edit">
                    <tr class="text-center">
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Gambar</th>
                      <th>Alamat</th>
                      <th>No. Telepon</th>
                      <th>Aksi</th>
                      <!-- <th></th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1?>
                    <?php foreach ($masyarakat as $masy) : ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $masy['nama_masyarakat'] ?></td>
                      <td><?= $masy['username_masyarakat'] ?></td>
                      <td><?= $masy['email_masyarakat'] ?></td>
                      <td><img style="width: 50px" src="<?= base_url('assets/img/profile/') .  $masy['gambar_masyarakat'] ?>" alt="pp">
                       </td>
                      <td><?= $masy['alamat_masyarakat'] ?></td>
                      <td><?= $masy['nohp_masyarakat'] ?></td>
                      <td>
                        <a href="<?= base_url('admin/ubahMasy/') ?>" class="btn btn-success"><i class="fas fa-fw fa-edit"></i></a>
                        <a href="<?= base_url('admin/hapusMasy/') . $masy['id_masyarakat'] ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                      </td>
<!--                       <td>
                      </td> -->
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


<!-- Modal -->
<div class="modal fade" id="tambahMasyarakat" tabindex="-1" role="dialog" aria-labelledby="tambahMasyarakat" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahMasyarakatLabel">Tambah Masyarakat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/tambahMasy') ?>" method="post">
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