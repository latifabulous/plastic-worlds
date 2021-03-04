<section class="daftar fdb-block pl-40" id="daftar" style="margin: 0 16px">
    <div class="row">
        <?php foreach ($plastik as $e) : ?>
        <div class="col-lg-3">
            <div class="card shadow">
                <img src="<?= base_url('assets/img/plastik/') . $e['gambar_plastik'] ?>" class="" height="200px"
                    alt="jenis-sampah">
                <div class="card-body">
                    <h5 class="nama-plastik" style="min-height: 60px"><?= $e['jenis_plastik'] ?></h5>
                    <!-- <p class="card-text"><?= $e['desc_plastik'] ?></p> -->
                    <hr>
                    <a href="<?= base_url('plastik/detail/') . $e['id_plastik'] ?>"
                        class="btn btn-edit w-100">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <div class="card shadow">
                    <div class="row justify-content-center pd-20">
                        <!--             <div class="col-lg-4 pos">
              <h3 class="">Sampah yang dapat ditukarkan</h3>
              <table class="table">
                <?php foreach ($plastik as $p) : ?>
                <tr class="card">
                  <td>
                  <img src="<?= base_url('assets/img/plastik/') . $p['gambar_plastik'] ?>" class="" width="200px" alt="jenis-sampah">
                  </td>
                  <td>
                  <div class="pl-20">
                  <h5 style=""><?= $p['jenis_plastik'] ?></h5>
                  <p><?= $p['desc_plastik'] ?></p>
                  <a href="<?= base_url('plastik/detail/') . $p['id_plastik'] ?>" class="btn btn-edit">Detail</a>
                  </div>
                  </td>
                </tr>
              <?php endforeach; ?>
              </table>
            </div>
 -->
                        <div class="col-lg-6">
                            <h3 class="mb-5">Sampah yang dapat ditukarkan</h3>
                            <form action="<?= base_url('plastik/penukaran') ?>" method="post">
                                <div class="form-group row">
                                    <label for="quantity1" class="col-sm-2 col-form-label">PET</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity1" name="quantity1" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity2" class="col-sm-2 col-form-label">HDPE</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity2" name="quantity2" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity3" class="col-sm-2 col-form-label">PVC</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity3" name="quantity3" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity4" class="col-sm-2 col-form-label">LDPE</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity4" name="quantity4" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity5" class="col-sm-2 col-form-label">PP</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity5" name="quantity5" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity6" class="col-sm-2 col-form-label">PS</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity6" name="quantity6" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity7" class="col-sm-2 col-form-label">Other</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="quantity7" name="quantity7" min="0" max="100"
                                            class="form-control" step="1" value="0" onchange="sum()">
                                    </div>
                                </div>

                        </div>

                        <div class="col-lg-6 mt-80">
                            <div class="row ">
                            </div>
                            <div class="row ml-plus">
                                <div class="penukaran">
                                    <div id="output">
                                        <div class="card btn-edit">
                                            <div class="card-body">
                                                <div class="card-body-icon size">
                                                    <i class="fas fa-coins mr-2"></i>
                                                </div>
                                                <div id="poin1Output"></div>
                                                <div id="poin2Output"></div>
                                                <div id="poin3Output"></div>
                                                <div id="poin4Output"></div>
                                                <div id="poin5Output"></div>
                                                <div id="poin6Output"></div>
                                                <div id="poin7Output"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <select name="id_umkm" id="id_umkm" class="form-control" required>
                                        <option value="">Pilih UMKM</option>
                                        <?php foreach ($umkm as $m) : ?>
                                        <option value="<?= $m['id_umkm'] ?>"><?= $m['nama_umkm'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_umkm', '<small class="text-danger">', ' </small>'); ?>
                                    <small class="form-text text-muted">UMKM yang anda pilih akan mem-verifikasi kembali
                                        sampah yang anda tukar.<b></b></small>

                                    <br>
                                    <div id="output2">
                                        <div class="card btn-edit">
                                            <div class="card-body">
                                                <div class="card-body-icon size">
                                                    <i class="fas fa-coins mr-2"></i>
                                                </div>
                                                <div id="totalOutput"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit" id="submit" class="btn btn-edit wid"
                                        onclick="ok()">Tukar</button>

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

<script>
document.getElementById('output').style.visibility = 'hidden';

var poin1 = document.getElementById('quantity1').addEventListener('input', function(e) {
    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin1Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis PET mendapat " + quantity * 2 + " poin";
});

var poin2 = document.getElementById('quantity2').addEventListener('input', function(e) {

    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin2Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis HDPE mendapat " + quantity * 3 + " poin";
});

var poin3 = document.getElementById('quantity3').addEventListener('input', function(e) {

    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin3Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis PVC mendapat " + quantity * 7 + " poin";
});

var poin4 = document.getElementById('quantity4').addEventListener('input', function(e) {

    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin4Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis LDPE mendapat " + quantity * 1 + " poin";
});

var poin5 = document.getElementById('quantity5').addEventListener('input', function(e) {

    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin5Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis PP mendapat " + quantity * 1 + " poin";
});

var poin6 = document.getElementById('quantity6').addEventListener('input', function(e) {

    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin6Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis PS mendapat " + quantity * 3 + " poin";
});

var poin6 = document.getElementById('quantity7').addEventListener('input', function(e) {

    document.getElementById('output').style.visibility = 'visible';

    let quantity = e.target.value;

    document.getElementById('poin7Output').innerHTML = "Menukar " + `${quantity}` +
        " sampah jenis PET mendapat " + quantity * 5 + " poin";
});

document.getElementById('output2').style.visibility = 'hidden';

function sum() {
    document.getElementById('output2').style.visibility = 'visible';

    var jenis1 = document.getElementById('quantity1').value;
    var jenis2 = document.getElementById('quantity2').value;
    var jenis3 = document.getElementById('quantity3').value;
    var jenis4 = document.getElementById('quantity4').value;
    var jenis5 = document.getElementById('quantity5').value;
    var jenis6 = document.getElementById('quantity6').value;
    var jenis7 = document.getElementById('quantity7').value;

    var sum_poin = parseFloat(jenis1) * 2 + parseFloat(jenis2) * 3 + parseFloat(jenis3) * 7 + parseFloat(jenis4) * 1 +
        parseFloat(jenis5) * 1 + parseFloat(jenis6) * 3 + parseFloat(jenis7) * 5;
    console.log(sum_poin);


    var totalQuantity = parseFloat(jenis1) + parseFloat(jenis2) + parseFloat(jenis3) + parseFloat(jenis4) + parseFloat(
        jenis5) + parseFloat(jenis6) + parseFloat(jenis7);


    document.getElementById('totalOutput').innerHTML = "Menukar " + `${totalQuantity}` + " sampah mendapat total " +
        sum_poin + "  poin";
}

// function ok() {
//     Swal.fire(
//         'Terima kasih sudah menukar plastik! ',
//         'Save the planet!', 'success'
//     ).then((result) => {
//         if (result.value) {
//             window.location = 'profile-masyarakat.html';

//         }
//     })
// }
</script>