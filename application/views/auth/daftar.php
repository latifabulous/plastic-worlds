  <section class="daftar fdb-block pl-40" id="daftar">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="row justify-content-center pd-20 align-items-center">
              <div class="col-lg-6 pos" >
                <div class="foto">
                  <img src="<?= base_url('assets/'); ?>img/daftar.jpg" class="img-fluid" alt="gambar-senang" style="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col">
                    <h2 class="text-center mg-sm-btm">Register</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="register">
                      <form class="user" action="<?= base_url('auth/daftar'); ?>" method="post">
                        <div class="form-group">
                          <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
                          <?= form_error('nama', '<small class="text-danger">', ' </small>'); ?>
                        </div>
                        <div class="form-group">
                          <input type="text" name="uname" class="form-control" id="uname" placeholder="Username" value="<?= set_value('uname'); ?>">
                          <?= form_error('uname', '<small class="text-danger">', ' </small>'); ?>
                        </div>
                        <div class="form-group">
                          <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email'); ?>">
                          <?= form_error('email', '<small class="text-danger">', ' </small>'); ?>
                        </div>
                        <div class="form-group">
                          <input type="text" name="notelp" class="form-control" id="notelp" placeholder="No. Telepon" value="<?= set_value('notelp'); ?>">
                          <?= form_error('notelp', '<small class="text-danger">', ' </small>'); ?>
                        </div>
                        <div class="form-group">
                          <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Konfirmasi Password">
                          <?= form_error('pass2', '<small class="text-danger">', ' </small>'); ?>
                        </div>
                        <input type="checkbox" id="tnc" name="tnc">
                        <label for="tnc">Saya menyetujui <a class="warna" href="">syarat dan ketentuan</a>.</label><br>
                        <div class="text-center">
                            <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Masuk</button>                          
                        </div>
                        <div class="text-center mt-3">
                          <p>Sudah punya akun? <span><a href="<?= base_url('auth'); ?>" class="warna">Masuk</a></span></p>
                          </div>
                      </form> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>