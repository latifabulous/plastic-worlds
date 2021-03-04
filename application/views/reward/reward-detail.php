  <!-- BREADCUMBR -->
  
  <nav aria-label="breadcrumb mg-sm-top">
    <div class="container">
      <div class="mg-top">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="beranda.html">Beranda</a></li>
        <li class="breadcrumb-item"><a href="profile-masyarakat.html">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tukar Poin</li>
      </ol>
    </div>
    </div>
  </nav>

  <section class="edit-profile" id="edit-profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card btn-edit pl-10">
            <div class="row color">
              <div class="card-body">
                <div class="card-body-icon font-size">
                  <i class="fas fa-coins mr-2"></i>
                </div>
                <h5><b>JUMLAH POIN</h5></b>
                <div class="display-4"><?= $masyarakat['poin'] ?></div>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col">
                <div class="card">
                  <ul class="nav flex-column pd-18">
                    <li class="nav-item ml-25">
                      <a class="nav-link active mg-btm-10" href="<?=  base_url('reward')?>"><i class="fas fa-gift mr-3 warna"></i>Rewards</a><hr>
                    </li>
                    <li class="nav-item ml-25">
                      <?php $keranjang = $this->cart->total_items() . ' reward' ?> 
                      <a class="nav-link" href="<?= base_url('reward/detail/' ) . $keranjang?>"><i class="fas fa-hourglass-start mr-3 warna"></i><?= $keranjang = $this->cart->total_items() . ' Reward' ?></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-8">
          <div class="card pd-20">
            <div class="edit">
            <div class="row">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jumlah</th>
                  <th>Poin</th>
                  <th>Sub-Total</th>
                </tr>
                <?php $i = 1 ?>
                <?php foreach ($this->cart->contents() as $r):?>
                  <tr>
                  <td><?= $i ?></td>
                  <td><?= $r['name'] ?></td>
                  <td><?= $r['qty'] ?></td>
                  <td><?= $r['price'] ?></td>
                  <td><?= $r['subtotal'] ?></td>
                </tr>
              <?php endforeach; ?>
              <?php $i++; ?>
                <tr>
                  <td colspan="4">Total Poin</td>
                  <td><?= $this->cart->total() ?></td>
                </tr>
              </table>
            </div>
              <div align="right">
                <a href="<?= base_url('reward/hapusKeranjang')?>" class=" btn btn-danger ">Hapus</a>
                <a href="<?= base_url('reward/tukar')?>" class=" btn btn-edit">Tukar</a>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>