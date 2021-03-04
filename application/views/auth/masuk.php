  <section class="daftar fdb-block" id="daftar">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="row justify-content-center pd-20 align-items-center">
              <div class="col-lg-6 pos" >
                <div class="foto">
                  <img src="<?= base_url('assets/'); ?>img/masuk.jpg" class="img-fluid" alt="gambar-senang" style="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col">
                    <h2 class="text-center mg-sm-btm">Masuk</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="register">
                      <?= $this->session->flashdata('message') ?>
                      <div class="masuk">
                        <form class="user" action="<?= base_url('auth/'); ?>" method="post">
                          <div class="form-group">
                            <input type="text" name="uname" class="form-control" id="uname" placeholder="Username" value="<?= set_value('uname'); ?>">
                            <?= form_error('uname', '<small class="text-danger">', ' </small>'); ?>
                          </div>
                          <div class="form-group">
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Password">
                            <?= form_error('pass', '<small class="text-danger">', ' </small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="role">Masuk sebagai: </label><br>
                            <select name="role" id="role" class="form-control" value="<?= set_value('role'); ?>">
                              <option value="masyarakat">Masyarakat</option>
                              <option value="komunitas">Komunitas</option>
                              <option value="umkm">UMKM</option>
                              <option value="admin">Admin</option>
                            </select>
                          </div>

                          <input type="checkbox" id="tnc" name="tnc">
                          <label for="tnc">Ingat akun saya</label><br>
                          <p>Lupa password? <span><a href="atur_pass.html" class="warna">Atur di sini</a></span></p>
                          <div class="text-center">
                            <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Masuk</button>
                          </div>
                          <hr>
                          <div class="text-center mt-3">
                          <p>Belum punya akun? <span><a href="<?= base_url('auth/'); ?>daftar" class="warna">Daftar</a></span></p>
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
    </div>
  </section>

<!--   <div class="input-group">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </div> -->

  
    
