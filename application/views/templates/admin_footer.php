

     
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('assets/admin/') ?>js/demo/datatables-demo.js"></script>
  <script src="<?= base_url('assets/js/') ?>script.js"></script>
  <script src="<?= base_url('assets/js/') ?>script_2.js"></script>




<script>

  $('.form-check-input').on('click', function () {
    //jika di klik ambil datanya yg namanya nama_menu
    const idMenu = $(this).data('menu');
    const idRole = $(this).data('role');

    $.ajax ({

      url: "<?= base_url('admin/changeAccess'); ?>",
      type: 'POST',
      data: {
        idMenu: idMenu,
        idRole: idRole
      },
      success: function () {
        document.location.href = "<?= base_url('admin/roleaccess/'); ?>" +idRole;
      }

    });

  });
  

</script>

</body>

</html>