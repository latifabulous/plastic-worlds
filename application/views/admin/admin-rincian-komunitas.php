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

              <div class="">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
                    <tr>
                      <td>Gambar</td>
                      <td><img src="<?= base_url('assets/img/profile/') . $kom['gambar_komunitas'] ?>" style="width: 200px" alt="komunitas"></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td><?= $kom['nama_komunitas'] ?></td>
                    </tr>
                    <tr>
                      <td>Username</td>
                      <td><?= $kom['username_komunitas'] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?= $kom['email_komunitas'] ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><?= $kom['alamat_komunitas'] ?></td>
                    </tr>
                    <tr>
                      <td>No. Hp</td>
                      <td><?= $kom['nohp_komunitas'] ?></td>
                    </tr>
                    <tr>
                      <td>Deskripsi</td>
                      <td><?= $kom['desc_komunitas'] ?></td>
                    </tr>
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