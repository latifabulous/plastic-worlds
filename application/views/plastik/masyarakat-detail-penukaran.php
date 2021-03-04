<section class="data mt-5" style="margin-bottom:115px" id="data">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 class="mg-sm-btm">Daftar Penukaran</h1>

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="btn-edit">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal Penukaran</th>
                                        <th>Tanggal Verifikasi</th>
                                        <!-- <th>Poin</th> -->
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($penukaran as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>

                                        <td><?= $p['tanggal_tukar'] ?></td>
                                        <td><?= $p['batas_tukar'] ?></td>
                                        <!-- <td><?= $p['total_poin'] ?></td> -->
                                        <td>
                                            <?php
                                                if ($p['status'] == '0') {
                                                    echo '<span class="btn btn-warning wid" disable>Belum diproses</span>';
                                                } else {
                                                    echo '<span class="btn btn-primary wid" disable >Selesai</span>';
                                                }
                                                ?>

                                        <td>
                                            <a href="<?= base_url('masyarakat/details/') . $p['id'] ?>"
                                                class="btn btn-primary"><i class="fas fa-fw fa-search-plus"></i></a>
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
</section>