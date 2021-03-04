    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid mt-4">

                <h1 class="h3 mb-2 text-gray-800 mb-4"><i class="fas fa-f fa-recycle mr-3 warna"></i></i><?= $judul; ?>
                </h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold warna"></h6>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('message'); ?>

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="btn-edit">
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Masyarakat</th>
                                        <th>PET</th>
                                        <th>HDP</th>
                                        <th>PVC</th>
                                        <th>LDPE</th>
                                        <th>PP</th>
                                        <th>PS</th>
                                        <th>OTHER</th>
                                        <th>Poin</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1 ?>
                                    <?php foreach ($penukaran as $p) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $p['id_masyarakat'] ?></td>
                                        <td><?= $p['pet'] ?></td>
                                        <td><?= $p['hdp'] ?></td>
                                        <td><?= $p['pvc'] ?></td>
                                        <td><?= $p['ldpe'] ?></td>
                                        <td><?= $p['pp'] ?></td>
                                        <td><?= $p['ps'] ?></td>
                                        <td><?= $p['other'] ?></td>
                                        <td><?= $p['total_poin'] ?></td>
                                        <td>
                                            <?php
                                                if ($p['status'] == '0') {
                                                    echo '<span class="btn btn-warning wid" disable>Belum diproses</span>';
                                                } else {
                                                    echo '<span class="btn btn-primary wid" disable >Selesai</span>';
                                                }
                                                ?>

                                        <td>
                                            <a href="<?= base_url('umkm/detailpenukaran/') . $p['id'] ?>"
                                                class="btn btn-success"><i class="fas fa-fw fa-edit"></i></a>
                                            <a href="<?= base_url('umkm/hapusPenukaran/') ?>" class="btn btn-danger"><i
                                                    class="fas fa-fw fa-trash"></i></a>
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
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->







        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <p>Copyright © <?= date('Y') ?> - Plastic World. All rights reserved.</p>
                </div>
            </div>
        </footer>