        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-2 text-gray-800 mt-4"><i class=" fas fa-fw fa-user-cog mr-3 warna"></i><?= $judul ?></h1>


            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i class="fas fa-download fa-fw mr-2 fa-sm text-white-50 "></i>Download Data</a>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold warna"><?= $role['nama_role'] ?></h6>
                </div>
                <div class="card-body">
                <?= $this->session->flashdata('message'); ?>
       

                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="btn-edit">
                      <tr>
                        <!-- menampilkan tabel user role -->
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Akses</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1 ?>
                      <?php foreach ($menu as $m) :?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $m['nama_menu'] ?></td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" <?= check_access($role['id_role'], $m['id_menu']) ?> data-role="<?= $role['id_role'];?>" data-menu="<?= $m['id_menu']; ?>">
                          </div>
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
        </div>
      </div>



