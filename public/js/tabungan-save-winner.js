function createPemenangTabungan() {
    // Ambil nilai dari elemen input hidden
    const data = {
      id_peserta: $('#winner_id_peserta').val(),
      id_hadiah: $('#winner_id_hadiah').val(),
      no_kupon: $('#winner_no_kupon').val(),
      jenis_hadiah: $('#winner_jenis_hadiah').val(),
      nama_hadiah: $('#winner_nama_hadiah').val(),
      nama_nasabah: $('#winner_nama_nasabah').val(),
      jumlah_kupon: $('#winner_jumlah_kupon').val(),
      nomor_cif: $('#winner_nomor_cif').val(),
      nomor_rekening: $('#winner_no_rekening').val(),
      saldo_akhir: $('#winner_saldo_akhir').val(),
      no_ktp: $('#winner_no_ktp').val(),
      alamat: $('#winner_alamat_nasabah').val(),
    };
  
    // Kirim data ke API menggunakan jQuery AJAX
    $.ajax({
      url: '{{ route("simpan.pemenang.tabungan") }}', // Ganti dengan endpoint API Anda
      method: 'POST',
      data: data,
      success: function (response) {
        // Tampilkan notifikasi jika berhasil
        alert('Data berhasil disimpan!');
        console.log('Respon API:', response);
      },
      error: function (xhr, status, error) {
        // Tampilkan notifikasi jika gagal
        alert('Data gagal disimpan: ' + xhr.responseText);
        console.error('Error:', error);
      },
    });
  }
  
  // Panggil fungsi ini saat tombol diklik
  $('#submitButton').click(function () {
    createPemenangTabungan();
  });