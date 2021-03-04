<section class="data mt-5" style="margin-bottom:115px" id="data">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mg-sm-btm">Daftar Penukaran</h1>

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <tbody>

                                    <tr>
                                        <td>Nama UMKM</td>
                                        <td><?= $penukaran['nama_umkm'] ?></td>
                                        </>
                                    <tr>
                                        <td>PET</td>
                                        <td><?= $penukaran['pet'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>HDPE</td>
                                        <td><?= $penukaran['hdp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>PVC</td>
                                        <td><?= $penukaran['pvc'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>LDPE</td>
                                        <td><?= $penukaran['ldpe'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>PP</td>
                                        <td><?= $penukaran['pp'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>PS</td>
                                        <td><?= $penukaran['ps'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Other</td>
                                        <td><?= $penukaran['other'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>