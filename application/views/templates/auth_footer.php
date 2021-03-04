  <footer>
    <div class="foot">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h4>PLASTIC WORLD</h4>
            <p>Website yang memudahkan proses pengolahan sampah plastik di Lombok NTB</p>
          </div>
          <div class="col-lg-4 ">
            <h4>Menu PLASTIC WORLD</h4>
            <div class="hov">
            <ul>
                <li><a href="<?= base_url('home/tentang/') ?>">Tentang Kami</a></li>
                <li><a href="<?= base_url('home/komunitas/') ?>l">Komunitas</a></li>
                <li><a href="<?= base_url('home/umkm/') ?>">UMKM</a></li>
                <li><a href="<?= base_url('home/event/') ?>">Event</a></li>
                <li><a href="<?= base_url('home/artikel/') ?>">Artikel</a></li>
            </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <h4>HUBUNGI KAMI</h4>
            <p>423, Apgujong-ro, Gangnam gu, Seoul</p>
            <p>(021) 098 082</p>
            <p>contact@plasticworld.com</p>
            <a href="www.facebook.com" class="fa fa-facebook mr-3 fa-3x"></a>
            <a href="www.twiter.com" class="fa fa-twitter mr-3 fa-3x"></a>
            <a href="www.instagram.com" class="fa fa-instagram mr-3 fa-3x"></a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col">
            <p>Copyright © <?= date('Y') ?> - Plastic World. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="<?= base_url('assets/js/jquery') ?>/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <!--  <script src="jsh/popper.min.js"></script> -->
  <script src="<?= base_url('assets/js/bootstrap') ?>/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/js/') ?>jquery.countTo.js"></script>

  <script src="<?= base_url('assets/js/') ?>form-validator.min.js"></script>
  <script src="<?= base_url('assets/js/') ?>contact-form-script.js"></script>
  <!-- <script src="jsh/main.js"></script> -->

  <script type="text/javascript">
    $('.timer').countTo({
      refreshInterval: 60,
      formatter: function(value, options) {
        return value.toFixed(options.decimals);
      },
    });
  </script>

<script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->

  </body>
</html>