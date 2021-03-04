        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-2 text-gray-800 mt-4"><i class="fas fa-tachometer-alt mr-3 warna"></i><?= $judul ?></h1>


            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i class="fas fa-download fa-fw mr-2 fa-sm text-white-50 "></i>Download Data</a>
          </div>

            
              

          <!-- Content Row -->
          <div class="row">
            <div class="col">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-edit mb-3 tombolTambahMenu" data-toggle="modal" data-target="#tambahMenu">Tambah Menu</a>

                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="btn-edit">
                      <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1 ?>
                      <?php foreach ($menu as $m) :?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $m['nama_menu'] ?></td>
                        <td>
                          <a href="<?= base_url('menu/ubahMenu/') . $m['id_menu']?>" class="btn btn-success tampilModalUbah" data-toggle="modal" data-target="#tambahMenu" data-id="<?= $m['id_menu']; ?>"><i class="fas fa-fw fa-edit"></i></a> 
                          <a href="<?= base_url('menu/hapusMenu/') . $m['id_menu']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
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
<div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="tambahMenu" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahMenuLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('menu') ?>" method="post">
          <input type="hidden" id="id" name="id">
        
         <div class="form-group">
          <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-edit">Tambah Menu</button>
      </div>
      </form>
    </div>
  </div>
</div>



