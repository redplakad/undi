        $(document).ready(function() {
            detail_hadiah = 
            // Ketika nilai pada select #id_hadiah berubah
            $('#id_hadiah').on('change', function() {
                // Ambil ID hadiah yang dipilih
                const idHadiah = $(this).val();

                // Cek apakah ID Hadiah tidak kosong
                if (idHadiah) {
                    // Menggunakan axios untuk melakukan request ke API
                    axios.get(`${window.location.origin}/api/hadiah/${idHadiah}`)
                        .then(function(response) {
                            // Menampilkan data hadiah
                            const hadiah = response.data.data;

                            $('#nama_hadiah').html(hadiah.nama_hadiah);
                            $('#jenis_hadiah').html(hadiah.level_hadiah);
                            $('#jumlah_hadiah').html(hadiah.jumlah_hadiah + " Unit");
                            $('#gambar_hadiah').attr('src',`${window.location.origin}/storage/${hadiah.gambar_hadiah}`);    
                            $('#image-winner').attr('src',`${window.location.origin}/storage/${hadiah.gambar_hadiah}`);

                            //menyimpan semua value di inputhidden
                            $("#winner_id_hadiah").val(hadiah.id);
                            $("#winner_jenis_hadiah").val(hadiah.level_hadiah);
                            $("#winner_nama_hadiah").val(hadiah.nama_hadiah);
                        })
                        .catch(function(error) {
                            // Menangani error jika tidak ditemukan atau gagal
                            if (error.response && error.response.status === 404) {
                                $('#hadiahDetails').html(`
                                    <p>Hadiah dengan ID tersebut tidak ditemukan.</p>
                                `);
                            } else {
                                $('#hadiahDetails').html(`
                                    <p>Terjadi kesalahan dalam mengambil data hadiah.</p>
                                `);
                            }
                        });
                } else {
                    alert('Pilih hadiah terlebih dahulu');
                }
            });
        });