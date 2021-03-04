  <!-- Page Wrapper -->
  <nav class="navbar navbar-expand-lg navbar-light">
      <!-- <div class="container"> -->
      <a class="navbar-brand" href="<?= base_url('admin') ?>"><img src="<?= base_url('assets/') ?>img/logo.png"
              width="55px" alt="logo-pw"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false"><img
                          src="<?= base_url('assets/img/profile/') . $admin['gambar_admin']; ?>" class="img-circle mr-2"
                          width="25px" alt="img-profile"><span class="mr-2"><?= $admin['nama_admin']; ?></span></a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item hov" href="<?= base_url('admin'); ?>"><i
                              class="fas fa-fw fa-cogs mr-3"></i>Kelola</a>
                      <a class="dropdown-item hov" href="<?= base_url('admin/editProfile'); ?>"><i
                              class="fas fa-fw fa-user-edit mr-3"></i>Edit Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item hov" href="<?= base_url('auth/keluar') ?>"><i
                              class="fas fa-fw fa-sign-out-alt mr-3"></i>Keluar</a>
                  </div>
              </li>
          </ul>
      </div>
      <!-- </div> -->
  </nav>