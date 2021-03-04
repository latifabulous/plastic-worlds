
  <!-- <section class="daftar fdb-block pl-40" id="daftar"> -->
    <div class="container mt-4">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row">
              <div class="col-lg-12 pd-20 ">
                <h1><?= $judul ?></h1>
                <hr>
                  <?= form_open_multipart('post/') ?>
              
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
                    <label for="artikel">Judul Artikel</label>
                      <input type="text" name="artikel" class="form-control" id="artikel summernote" value="<?= set_value('artikel'); ?>">
                      <?= form_error('artikel', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="desc">Deskripsi singkat</label>
                      <input type="text" name="desc" class="form-control" id="desc" value="<?= set_value('desc'); ?>">
                      <?= form_error('desc', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="contents">Isi artikel</label>
                    <textarea name="contents" class="form-control" id="summernote"></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Tambah Artikel</button>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </section> -->

</div>

