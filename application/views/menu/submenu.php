        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-2 text-gray-800 mt-4"><i class="fas fa-tachometer-alt mr-3 warna"></i><?= $judul ?></h1>


            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i class="fas fa-download fa-fw mr-2 fa-sm text-white-50 "></i>Download Data</a>
          </div>

            
              

          <!-- Content Row -->
          <div class="row">
            <div class="col-sm">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-edit mb-3 tombolTambahSubmenu" data-toggle="modal" data-target="#tambahSubmenu">Tambah Submenu</a>

                  <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="btn-edit">
                      <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Sub Menu</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col" colspan="2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1 ?>
                      <?php foreach ($submenu as $sm) :?>
                      <tr>
                        <th scope="row"><?= $i ?></th>
                        <td><?= $sm['nama_submenu'] ?></td>
                        <td><?= $sm['nama_menu'] ?></td>
                        <td><?= $sm['url_submenu'] ?></td>
                        <td><?= $sm['icon_submenu'] ?></td>
                        <td><?= $sm['is_active_submenu'] ?></td>
                        <td>
                          <a href="<?= base_url('menu/ubahSubmenu/'). $sm['id_submenu'] ?>" class="btn btn-success tampilModalSubmenu" data-toggle="modal" data-target="#tambahSubmenu" data-id="<?= $sm['id_submenu'] ?>"><i class="fas fa-fw fa-edit"></i></a>  
                        </td>
                        <td>
                          <a href="<?= base_url('menu/hapusSubmenu/') . $sm['id_submenu']?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                          
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
<div class="modal fade" id="tambahSubmenu" tabindex="-1" role="dialog" aria-labelledby="tambahSubmenu" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahSubmenuLabel">Tambah Submenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body in">
      <form action="<?= base_url('menu/submenu') ?>" method="post">
          <input type="hidden" id="id" name="id">
        
        <div class="form-group">
          <input type="text" class="form-control" id="submenu" name="submenu" placeholder="Nama Submenu" value="<?= set_value('submenu'); ?>">
        </div>
        <div class="form-group">
          <select name="id_menu" id="id_menu" class="form-control" value="<?= set_value('id_menu'); ?>">
            <option value="">Pilih Menu</option>
            <?php foreach ($menu as $m ) :?>
            <option value="<?= $m['id_menu'] ?>"><?= $m['nama_menu'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="<?= set_value('url'); ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon" value="<?= set_value('icon'); ?>">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
            <label class="form-check-label" for="is_active">
              Aktif? 
            </label>
          </div>
        </div>
      </div>
      <div class="modal-footer submenus">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-edit">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>