
  <!-- <section class="daftar fdb-block pl-40" id="daftar"> -->
    <div class="container mt-4">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row">
              <div class="col-lg-12 pd-20 ">
                <h1><?= $judul ?></h1>
                <hr>
                  <?= form_open_multipart('komunitas/tambahEvent') ?>
              
                <div class="row">
                    <div class="col-lg-4">
                      <div class="wrapper-kelas rounded logo-center white-bg">
                        <!-- <input type="hidden" name="id" id="id"> -->
                        <img src="<?= base_url('assets/img/profile/') . $komunitas['gambar_komunitas']?>" class="img-fluid" alt="">
                      </div>
                    </div>
                      <div class="col-lg4">
                          <div class="form-group">
                            <input type="file" class="form-control-file" id="gambar" name="gambar" >
                            <?= form_error('gambar', '<small class="text-danger">', ' </small>'); ?>
                          </div>
                      </div>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="event">Nama Event</label>
                      <input type="text" name="event" class="form-control" id="event" value="<?= set_value('event'); ?>">
                      <?= form_error('event', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                      <input type="date" name="tanggal" class="form-control" id="tanggal" value="<?= set_value('tanggal'); ?>">
                      <?= form_error('tanggal', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="email">Waktu</label>
                      <input type="time" name="waktu" class="form-control" id="waktu" value="<?= set_value('waktu'); ?>">
                      <?= form_error('waktu', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="tempat">Tempat</label>
                      <input type="text" name="tempat" class="form-control" id="tempat" value="<?= set_value('tempat'); ?>">
                      <?= form_error('tempat', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="kuota">Kuota</label>
                      <input type="number" name="kuota" class="form-control" id="kuota" value="<?= set_value('kuota'); ?>">
                      <?= form_error('kuota', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                   <div class="form-group mg-sm-top">
                    <label for="deskripsi">Deskripsi Event</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="80" rows="5" placeholder="Event ini ..." value="<?= set_value('deskripsi'); ?>"></textarea>
                  </div>
<!--                   <div class="form-group">
                    <label for="email">Penyelenggara</label>
                    <select name="komunitas" id="komunitas" class="form-control">
                      <option value="">Pilih Komunitas</option>
                      <option value="Exo-L Peduli">Exo-L Peduli</option>
                      <option value="Tastura">Earth Hour</option>
                      <option value="Yuk Ngaji">Yuk Ngaji</option>
                    </select>
                  </div> -->
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Tambah Event</button>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </section> -->

</div>