    <ul class="navbar-nav btn-edit sidebar sidebar-dark accordion" id="accordionSidebar">


      <!-- QUERY DARI MENU -->
      <!-- YANG BOLEH DIAKSES OLEH USER BERSANGKUTAN -->
      <!-- TAMPILKAN MENU YANG BISA DIAKSES OLEH ADMIN, MASY KOM, UMKM -->
      <li class="mt-4"></li>
      <?php 
        // id, menu dari user_menu
        // on untuk kunci primary dan foreign key
        // URUTKAN BERDASARKAN  
        $role_id = $this->session->userdata('id_role');
        $queryMenu = "SELECT `user_menu`.`id_menu`, `nama_menu`
                        FROM `user_menu` JOIN `user_accessmenu`
                          ON `user_menu`.`id_menu` = `user_accessmenu`.`id_menu`
                       WHERE `user_accessmenu`.`id_role` = $role_id
                    ORDER BY `user_accessmenu`.`id_menu` ASC
        ";

        $menu = $this->db->query($queryMenu)->result_array();
      ?>
      
      <?php foreach ($menu as $m) :?>

      <div class="sidebar-heading">
        <?= $m['nama_menu'] ?>
      </div>

      <?php 
        $id = $m['id_menu']; // {$m['id']}
        // $querSubyMenu = "SELECT *
        //         FROM `user_submenu` JOIN `user_menu`
        //           ON `user_submenu`.`id_menu` = `user_menu`.`id_menu`
        //        WHERE `user_submenu`.`id_menu` = $id
        //          AND `user_submenu`.`is_active_submenu` = 1
        // ";

        $querySubMenu = "SELECT *
                FROM `user_submenu`
               WHERE `id_menu` = $id
                 AND `is_active_submenu` = 1
        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();

      ?>
        
        <?php foreach ($subMenu as $sub) :?>
          <?php if ($judul == $sub['nama_submenu']) : ?>
          <li class="nav-item active">
            <?php else :?>

            <li class="nav-item">
          <?php endif; ?>
            <a class="nav-link color pb-0" href="<?= base_url($sub['url_submenu']) ?>">
              <i class="<?= $sub['icon_submenu']?>"></i>
              <span style=""><?= $sub['nama_submenu'] ?></span></a>
          </li>
        <?php endforeach; ?>
      <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>
      <!-- Divider -->
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->