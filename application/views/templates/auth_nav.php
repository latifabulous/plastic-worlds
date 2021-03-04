
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/'); ?>img/logo.png" width="55px" alt="logo-pw"></a>      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url() ?>">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/komunitas/') ?>">Komunitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/umkm/') ?>">UMKM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/event/') ?>">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('home/artikel/') ?>">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/daftar/') ?>">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-edit" href="<?= base_url('auth') ?>">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>