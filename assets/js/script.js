
$(function() {
  $('.tombolTambahMenu').on('click', function() {
    $('#tambahMenuLabel').html('Tambah Menu');
    $('.modal-footer button[type=submit]').html('Tambah');

    $('#menu').val('');
  });

  $('.tampilModalUbah').on('click', function() {
    
    $('#tambahMenuLabel').html('Ubah Data Menu');
    $('.modal-footer button[type=submit]').html('Ubah Menu');
    
    //mengubah action form karena kita pake form tambah maka ubah ke form ubah
    // jquery cari class modal body lalu cari form di dalamnya 
    //ubah atribut acion yang sebelumnya mahasiswa/tambah jadi mahasiswa/ubah
    $('.modal-body form').attr('action', 'http://localhost/PlasticWorld/menu/ubahMenu');

    const id = $(this).data('id');


    $.ajax({
      url: "http://localhost/PlasticWorld/menu/getmenu",
      data: {id : id},
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('#menu').val(data.nama_menu);  
        $('#id').val(data.id_menu);
      }
    });
  });
});


$(function() {
  $('.tombolTambahSubmenu').on('click', function() {
    $('#tambahSubmenuLabel').html('Tambah Submenu');
    $('.submenus button[type=submit]').html('Tambah Submenu');

    $('#submenu').val('');
    $('#id_menu').val('');
    $('#url').val('');
    $('#icon').val('');
  });

  $('.tampilModalSubmenu').on('click', function() {
    
    $('#tambahSubmenuLabel').html('Ubah Data Subenu');
    $('.submenus button[type=submit]').html('Ubah Submenu');
    
    //mengubah action form karena kita pake form tambah maka ubah ke form ubah
    // jquery cari class modal body lalu cari form di dalamnya 
    //ubah atribut acion yang sebelumnya mahasiswa/tambah jadi mahasiswa/ubah
    $('.in form').attr('action', 'http://localhost/PlasticWorld/menu/ubahSubmenu');

    const id = $(this).data('id');


    $.ajax({
      url: "http://localhost/PlasticWorld/menu/getSubmenu",
      data: {id : id},
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        console.log(data);
      //   $('#menu').val(data.nama_menu);  
        $('#id').val(data.id_submenu);
        $('#submenu').val(data.nama_submenu);
        $('#id_menu').val(data.id_menu);
        $('#url').val(data.url_submenu);
        $('#icon').val(data.icon_submenu);
        $('#is_active').val(data.is_active_submenu);
      }
    });
  });
});
