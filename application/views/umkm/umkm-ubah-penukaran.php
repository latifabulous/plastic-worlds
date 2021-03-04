<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid mt-4">

            <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-fw fa-calendar-alt mr-3 warna"></i></i><?= $judul ?>
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold warna"></h6>
                </div>
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>

                    <div class="">
                        <form action="<?= base_url('umkm/ubahPenukaran') ?>" method="post">
                            <input type="hidden" id="id" name="id" value="<?= $penukaran['id'] ?>">
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama</label>

                                <input type="text" id="nama" class=" form-control" name="nama"
                                    value="<?= $penukaran['id_masyarakat'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity1" class="col-form-label">PET</label>

                                <input type="number" id="quantity1" name="quantity1" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['pet'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="quantity2" class="col-form-label">HDPE</label>

                                <input type="number" id="quantity2" name="quantity2" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['hdp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity3" class="col-form-label">PVC</label>

                                <input type="number" id="quantity3" name="quantity3" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['pvc'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity4" class="col-form-label">LDPE</label>

                                <input type="number" id="quantity4" name="quantity4" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['ldpe'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity5" class="col-form-label">PP</label>

                                <input type="number" id="quantity5" name="quantity5" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['pp'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity6" class="col-form-label">PS</label>

                                <input type="number" id="quantity6" name="quantity6" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['ps'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="quantity7" class="col-form-label">Other</label>

                                <input type="number" id="quantity7" name="quantity7" min="0" max="100"
                                    class="form-control" step="1" value="<?= $penukaran['other'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="poin" class="col-form-label">Poin</label>

                                <input type="number" id="poin" name="poin" min="0" max="10000" class="form-control"
                                    step="1">
                            </div>
                            <label for="poin" class="col-form-label">Status</label>
                            <select name="status" id="status" class="form-control" value="<?= $penukaran['status'] ?>">
                                <option value="0">Belum Diproses</option>
                                <option value="1">Selesai</option>

                            </select>
                    </div>
                    <button type="submit" class="btn btn-edit">Ubah</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- </div> -->
    <!-- End of Main Content -->


    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <p>Copyright © <?= date('Y') ?> - Plastic World. All rights reserved.</p>
            </div>
        </div>
    </footer>