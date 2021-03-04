
  <!-- <section class="daftar fdb-block pl-40" id="daftar"> -->
    <div class="container mt-4">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="row">
              <div class="col-lg-12 pd-20 ">
                <h1><?= $judul ?></h1>
                <hr>
                  <?= form_open_multipart('plastik/tambahPlastik') ?>
              
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="wrapper-kelas rounded logo-center white-bg">
                        <!-- <input type="hidden" name="id" id="id"> -->

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
                    <label for="jenis">Jenis</label>
                      <input type="text" name="jenis" class="form-control" id="jenis summernote" value="<?= set_value('jenis'); ?>">
                      <?= form_error('jenis', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="poin">Poin</label>
                      <input type="number" name="poin" class="form-control" id="poin" value="<?= set_value('poin'); ?>">
                      <?= form_error('poin', '<small class="text-danger">', ' </small>'); ?>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="desc">Deskripsi</label>
                    <textarea name="desc" class="form-control"></textarea>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="contents">Detail</label>
                    <textarea name="contents" class="form-control" id="summernote"></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Tambah Plastik</button>
                </form> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </section> -->

</div>

