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
          <?= $this->session->flashdata('message') ?>
          
          <div class="card pd-20">
            <!-- <div class="edit"> -->
            <div class="row">

            <?php foreach( $reward as $r): ?>

              <div class="col lg-2">
                <div class="card">
                  <img src="<?= base_url('assets/img/reward/'). $r['gambar_reward'] ?>" class="card-img-top " style="height: 200px" alt="reward">
                  <div class="card-body">
                    <h6 class="card-text font-weight-bold" style="min-height: 40px"><?= $r['nama_reward'] ?></h6><hr>
                    <h6 class="card-title"><i class="fas fa-coins mr-2 warna"></i><?= $r['jumlah_poin'] ?></h6>
                    <?php if ($r['is_active_reward'] == '1') {
                      echo anchor('reward/tambah/'. $r['id_reward'], '<button class="btn btn-edit wid ">Tukar</button>');
                    } else {
                      echo '<span class="btn wid" disable>Tidak Tersedia</span>';

                    }

                    ?>                  
                    
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
          <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>