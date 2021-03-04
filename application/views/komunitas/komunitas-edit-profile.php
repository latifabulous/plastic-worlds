
  <section class="edit-profile mt-4" id="edit-profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 scrollspy-example" data-spy="scroll" data-target="#list-example" data-offset="50">
          <div class="card pd-20">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="account" role="tabpanel">    
                <h1>Edit Profile</h1>
                <hr>
                <?= $this->session->flashdata('message') ?>
                <?= $this->session->flashdata('pesan') ?>

                <div class="akun">
                  <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                  <?= form_open_multipart('komunitas/editProfile') ?>
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="wrapper-kelas rounded logo-center white-bg">
                          <img src="<?= base_url('assets/img/profile/') . $komunitas['gambar_komunitas']?>" class="img-fluid" alt="">
                        </div>
                      </div>
                      <div class="col-lg4">
                          <div class="form-group">
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                            <?= form_error('gambar', '<small class="text-danger">', ' </small>'); ?>
                          </div>
                      </div>
                    </div>



                    <div class="mg-sm-btm mg-sm-top"><h3 id="list-item-1">Informasi Akun</h3></div>
                    
                    <div class="form-group">
                      <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $komunitas['nama_komunitas']; ?>">
                        <?= form_error('nama', '<small class="text-danger">', ' </small>'); ?>

                    </div>
                    <div class="form-group">
                      <label for="uname">Username</label>
                      <input type="text" name="uname" class="form-control" id="uname" readonly value="<?= $komunitas['username_komunitas']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" value="<?= $komunitas['email_komunitas']; ?>">
                      <?= form_error('email', '<small class="text-danger">', ' </small>'); ?>

                    </div>
                    
                    </div>

                    <div class="mg-sm-btm mg-sm-top"><h3 id="list-item-3">Data Diri</h3></div>

                    <div class="form-group">
                      <label for="nohp">Nomor Telepon</label>
                      <input type="text" name="nohp" class="form-control" id="nohp" placeholder="Nomor Telepon" value="<?= $komunitas['nohp_komunitas']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $komunitas['alamat_komunitas']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="desc">Deskripsi</label>
                      <textarea name="desc" class="form-control" id="desc" cols="80" rows="5" placeholder="Komunitas" value="<?= $komunitas['desc_komunitas']; ?>"></textarea>
                    </div>
                    <div class="form-group mg-sm-btm mg-sm-top">
                      <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Simpan Perubahan</button>
                    </div>
                  </form>

                    <form class="user" action="<?= base_url('komunitas/gantiPass'); ?>" method="post">
                     <div class="mg-sm-btm mg-sm-top"><h3 id="list-item-2">Ganti Password</h3></div>

                    <div class="form-group">
                      <label for="pass">Password Sekarang</label>
                      <input type="password" name="pass" class="form-control" id="pass">
                      <?= form_error('pass', '<small class="text-danger">', ' </small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="new-pass">Password Baru</label>
                      <input type="password" name="new-pass" class="form-control" id="new-pass">
                      <?= form_error('new-pass', '<small class="text-danger">', ' </small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="new-pass2">Konfirmasi Password</label>
                      <input type="password" name="new-pass2" class="form-control" id="new-pass2">
                      <?= form_error('new-pass2', '<small class="text-danger">', ' </small>'); ?>
                    <div class="form-group mg-sm-btm mg-sm-top">
                      <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Ganti Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>