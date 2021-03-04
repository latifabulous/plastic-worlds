        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-2 text-gray-800 mt-4"><i class="fas fa-fw fa-user-cog mr-3 warna"></i><?= $judul ?></h1>


            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i class="fas fa-download fa-fw mr-2 fa-sm text-white-50 "></i>Download Data</a>
          </div>

            
              

          <!-- Content Row -->
          <div class="row">
            <div class="col">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold warna"></h6>
                </div>
                <div class="card-body">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-edit mb-3" data-toggle="modal" data-target="#tambahRole">Tambah Role</a>

                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="btn-edit">
                      <tr class="text-center">
                        <!-- menampilkan tabel user role -->
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1 ?>
                      <?php foreach ($role as $r) :?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $r['nama_role'] ?></td>
                        <td>
                          <!-- untuk memilih akses pada user -->
                          <a href="<?= base_url('admin/roleaccess/') . $r['id_role']?>" class="badge badge-warning">akses</a>
                          <a href="" class="badge badge-primary">edit</a>
                          <a href="" class="badge badge-danger">hapus</a>
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


<!-- Modal -->
<div class="modal fade" id="tambahRole" tabindex="-1" role="dialog" aria-labelledby="tambahRole" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahRole">Tambah Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('admin/role') ?>" method="post">
         <div class="form-group">
          <input type="text" class="form-control" id="role" name="role" placeholder="Nama Role" value="<?= set_value('menu'); ?>">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-edit">Tambah Role</button>
      </div>
      </form>
    </div>
  </div>
</div>