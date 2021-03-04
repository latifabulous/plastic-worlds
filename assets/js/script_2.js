$(function() {
  $('.tombolTambahReward').on('click', function() {
    $('#tambahRewardLabel').html('Tambah Reward');
    $('.modal-footer button[type=submit]').html('Tambah');

    $('#nama').val('');
    $('#poin').val('');
    $('#gambar').val('');
    // $('#status').val('');
  });

  $('.tampilModalReward').on('click', function() {
    
    $('#tambahRewardLabel').html('Ubah Data Reward');
    $('.modal-footer button[type=submit]').html('Ubah Reward');
    
    //mengubah action form karena kita pake form tambah maka ubah ke form ubah
    // jquery cari class modal body lalu cari form di dalamnya 
    //ubah atribut acion yang sebelumnya mahasiswa/tambah jadi mahasiswa/ubah
    $('.edits form').attr('action', 'http://localhost/PlasticWorld/admin/editReward');

    const id = $(this).data('id');


    $.ajax({
      url: "http://localhost/PlasticWorld/admin/getReward",
      data: {id : id},
      method: 'POST',
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $('#nama').val(data.nama_reward);  
        $('#poin').val(data.jumlah_poin);  
        // $('#gambar').attr("src", data.gambar_reward);  
        $('#status').val(data.is_active_reward);  
        $('#id').val(data.id_reward);
      }
    });
  });
});
