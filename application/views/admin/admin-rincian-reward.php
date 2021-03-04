    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <div class="container-fluid mt-4">

          <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-fw fa-calendar-alt mr-3 warna"></i></i><?= $judul ?></h1>
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
                      <td><img src="<?= base_url('assets/img/reward/') . $reward['gambar_reward'] ?>" style="width: 200px" alt="reward"></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td><?= $reward['nama_reward'] ?></td>
                    </tr>
                    <tr>
                      <td>Poin</td>
                      <td><?= $reward['jumlah_poin'] ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td>
                        <?php if ($reward['is_active_reward'] == '1') {
                          echo '<span>Aktif</span>';
                        } else {
                          echo '<span>Tidak Aktif</span>';
                        }
                        ?>                  
                      </td>
                    </tr>
                  </tbody>
                </table>
                <br>  <br>  
                <h1 class="mb-3">Data penukar reward</h1>
                <table class="table table-hover">
                    <tr style="font-weight: bolder;">
                      <td>No.</td>
                      <td>Nama Masyarakat</td>
                      <td>Email</td>
                    </tr>
                    <?php $i = 1?>
                    <?php foreach ($penukaran as $p) : ?>
                      <tr>
                        <td><?= $i; ?></td>
                      <td><?= $p['nama_masyarakat'] ?></td>
                      <td><?= $p['email_masyarakat'] ?></td>
                      </tr>
                    <?php $i++ ?>
                  <?php endforeach; ?> 
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