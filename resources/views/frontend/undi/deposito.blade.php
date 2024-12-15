<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT BPR BATURAJA | UNDIAN BERHADIAH TAHUN {{ DATE("Y") }}</title>
    @vite('resources/css/app.css')
    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td {
            padding: 8px;
            border: 0px;
        }

        .table td:first-child {
            width: 150px;
            /* Lebar kolom pertama */
        }

        .table td:nth-child(2) {
            width: 20px;
            /* Lebar kolom kedua */
            text-align: center;
        }

        .table td:last-child {
            width: auto;
            /* Kolom terakhir menyesuaikan */
        }
    </style>
</head>

<body class="text-gray-800">
    <main class="container mx-auto px-4 py-8 center">
        <div class="bg-white rounded shadow p-4 flex items-center space-x-10 justify-center">
            <img src="{{ env('APP_URL') }}/images/OJK.png" alt="Image 1" class="h-12 w-auto">
            <img src="{{ env('APP_URL') }}/images/perbarindo.png" alt="Image 2" class="h-12 w-auto">
            <img src="{{ env('APP_URL') }}/images/logo.png" alt="Image 3" class="h-12 w-auto">
            <img src="{{ env('APP_URL') }}/images/lps.png" alt="Image 4" class="h-12 w-auto">
            <img src="{{ env('APP_URL') }}/images/logo-oku.png" alt="Image 5" class="h-12 w-auto">
            <img src="{{ env('APP_URL') }}/images/perbamida.png" alt="Image 6" class="h-12 w-auto">
        </div>
        <section class="text-center mt-8 mb-5">
            <h1 class="text-[3rem] font-extrabold" style="color: #4574b8">
                UNDIAN DEPOSITO BERHADIAH TAHUN {{ date('Y')}}
            </h1>
            <img src="{{ env('APP_URL') }}/images/logo.png" alt="Logo" class="mx-auto mt-4 w-[18rem] h-auto">

        </section>
        <div class="flex flex-row items-start gap-4">
            <!-- Gambar Hadiah -->
            <div class="w-[24%] bg-white rounded shadow">
                <div>
                    <img id="gambar_hadiah" src="{{ env('APP_URL') }}/images/hadiah.png" alt="">
                </div>
                <div id="hadiahDetails" class="p-6">
                    <!-- Hasil data hadiah akan ditampilkan di sini -->
                    <div class="overflow-x-auto">
                        <table class="table">
                            <tbody>
                                <!-- row 1 -->
                                <tr>
                                    <td>Nama Hadiah</td>
                                    <td>:</td>
                                    <td id="nama_hadiah"></td>
                                </tr>
                                <!-- row 2 -->
                                <tr>
                                    <td>Jenis Hadiah</td>
                                    <td>:</td>
                                    <td id="jenis_hadiah"></td>
                                </tr>
                                <!-- row 3 -->
                                <tr>
                                    <td>Jumlah Hadiah</td>
                                    <td>:</td>
                                    <td id="jumlah_hadiah"></td>
                                </tr>
                                <tr>
                                    <td>Produk</td>
                                    <td>:</td>
                                    <td id="info_produk"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Form Pilih Hadiah -->

            <div class="w-[70%] bg-white p-6 rounded shadow">
                <!-- Select Daftar Hadiah -->
                <div class="mb-4" id="daftarhadiah">
                    <label for="id_hadiah" class="block text-gray-700 font-medium mb-2">Pilih Hadiah</label>
                    <select id="id_hadiah" name="id_hadiah" class="select select-bordered w-full max-w-x">
                        <option value="" disabled selected>-- Pilih Hadiah --</option>
                        @foreach (DB::table('daftar_hadiah')->where('jumlah_hadiah', '>', 0)->get() as $hadiah)
                            <option value="{{ $hadiah->id }}">{{ $hadiah->nama_hadiah }} - Hadiah
                                {{ $hadiah->level_hadiah }} | {{ $hadiah->jumlah_hadiah }}pcs</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-4" id="daftarproduk">
                    <label for="id_produk" class="block text-gray-700 font-medium mb-2">Pilih Produk</label>
                    <select id="id_produk" name="id_hadiah" class="select select-bordered w-full max-w-x" disabled>
                        <option value="" disabled selected>-- Pilih Produk --</option>
                        @foreach (DB::table('kupon_deposito')->distinct()->pluck('produk') as $produk)
                            <option value="{{ $produk }}">{{ $produk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="box flex flex-col items-center justify-center gap-4 p-6 bg-gray-100 rounded shadow-md">
                    <!-- Number Flip Display -->
                    <div class="separate font-bold text-gray-700" style="font-size: 118px;"></div>
                </div>
                <div class="box flex flex-col items-center justify-center gap-4 p-6">
                    <!-- Buttons -->
                    <div class="flex gap-4">
                        <button class="start btn btn-info text-white" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.5 5.653c0-1.427 1.529-2.33 2.779-1.643l11.54 6.347c1.295.712 1.295 2.573 0 3.286L7.28 19.99c-1.25.687-2.779-.217-2.779-1.643V5.653Z" />
                            </svg>
                            START
                        </button>
                        <button class="stop btn btn-error text-white hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4.5 7.5a3 3 0 0 1 3-3h9a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9Z" />
                            </svg>
                            STOP
                        </button>
                        <a href="{{ route('undi.deposito') }}" class="btn btn-warning text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 16 16"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.28 4.22a.75.75 0 0 0-1.06 1.06L6.94 8l-2.72 2.72a.75.75 0 1 0 1.06 1.06L8 9.06l2.72 2.72a.75.75 0 1 0 1.06-1.06L9.06 8l2.72-2.72a.75.75 0 0 0-1.06-1.06L8 6.94 5.28 4.22Z" />
                            </svg>
                            RESET
                        </a>
                    </div>
                </div>
                <hr>
                <br>
                @include('frontend.menu')
            </div>
        </div>
        <img src="{{ env('APP_URL') }}/images/art.png" alt="art top right"
            class="fixed top-0 right-0 w-[100px] h-[100px] z-[-1]" style="width: 250px;height: auto;" />
    </main>
    <dialog id="my_modal_3" class="modal">
        <div class="card bg-base-100 w-[400px] shadow-xl">
            <figure>
                <img id="image-winner" src="https://placehold.co/600x400.png" alt="placeholder" />
            </figure>
            <div class="card-body">
                <h1 class="card-title" id="winner_kupon">7777777777</h1>
                <div class="overflow-x-auto">
                    <table class="table">
                        <tbody>
                            <!-- row 1 -->
                            <tr>
                                <td>Nama Pemenang</td>
                                <td>:</td>
                                <td id="winner_nama"></td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <td>Nomor Rekening</td>
                                <td>:</td>
                                <td id="winner_nomor_rekening"></td>
                            </tr>
                            <tr>
                                <td>Produk</td>
                                <td>:</td>
                                <td id="win_produk"></td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <td>Jenis Produk</td>
                                <td>:</td>
                                <td id="winner_alamat"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div role="alert" class="alert-id alert hidden">
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 shrink-0 stroke-current"
                        fill="none"
                        viewBox="0 0 24 24">
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span id="alert-message">Your message here.</span>
                        <br>
                    </div>
                </div>
                <div class="modal-action">
                    <form method="dialog">
                        <input type="hidden" name="winner_id_peserta" id="winner_id_peserta">
                        <input type="hidden" name="winner_id_hadiah" id="winner_id_hadiah">
                        <input type="hidden" name="winner_no_kupon" id="winner_no_kupon">
                        <input type="hidden" name="winner_jenis_hadiah" id="winner_jenis_hadiah">
                        <input type="hidden" name="winner_nama_hadiah" id="winner_nama_hadiah">
                        <input type="hidden" name="winner_nama_nasabah" id="winner_nama_nasabah">
                        <input type="hidden" name="winner_jumlah_kupon" id="winner_jumlah_kupon">
                        <input type="hidden" name="winner_nomor_cif" id="winner_nomor_cif">
                        <input type="hidden" name="winner_no_rekening" id="winner_no_rekening">
                        <input type="hidden" name="winner_saldo_akhir" id="winner_saldo_akhir">
                        <input type="hidden" name="winner_no_ktp" id="winner_no_ktp">
                        <input type="hidden" name="winner_alamat_nasabah" id="winner_alamat_nasabah">

                        <!-- if there is a button in form, it will close the modal -->
                        <button type="button" class="btn btn-primary" id="submitButton">Simpan</button>
                        <a href="{{ route('undi.deposito') }}" class="btn btn-error" id="resetButton">Reset</a>
                    </form>
                </div>
            </div>
        </div>
    </dialog>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/number-flip/dist/number-flip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
    <script src="{{ env('APP_URL') }}/js/tabungan-select.js"></script>
    <script src="{{ env('APP_URL') }}/js/confetti.js"></script>
    <script>
        function createPemenangDeposito() {
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
            url: '{{ env("APP_URL") }}/api/pemenang-deposito', // Ganti dengan endpoint API Anda
            method: 'POST',
            data: data,
            success: function (response) {
                // Tampilkan notifikasi jika berhasil
                //alert('Data berhasil disimpan!');
                if(response.status == 201){
                    console.log('Respon API:', response);
                    
                    $(".alert-id").removeClass("hidden");
                    $(".alert-id").addClass("alert-success");
                    $("#alert-message").html(response.message);
                    
                    $('#submitButton').addClass("hidden");
                }else{
                    console.log('Respon API:', response);
                    $(".alert-id").removeClass("hidden");
                    $(".alert-id").addClass("alert-error");
                    $("#alert-message").html(response.message);

                    $('#submitButton').addClass("hidden");
                }
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
            createPemenangDeposito();
        });
    </script>
    <script>
        let intervalId = null;
        let count = 7777777779;

        // Inisialisasi array untuk menyimpan data
        let randomNumbers = [];

        $(document).ready(function() {

            winner = null;
            start = false;

            hadiah_status = false;
            produk_status = false;
            produk = null;

            // Fungsi untuk mengambil data dari API
            async function fetchNomorRekening(produk) {
                try {
                    const response = await axios.get(
                    `{{ env('APP_URL') }}/api/nomor-kupon-deposito/${produk}`); // Ganti URL sesuai dengan server Anda
                    if (response.data.success) {
                        randomNumbers = response.data.data; // Simpan data API ke array
                        //console.log('Data berhasil diambil:', randomNumbers);   
                        produk_status = true;
                    } else {
                        //console.error('Gagal mengambil data:', response.data.message || 'Unknown error');
                    }
                } catch (error) {
                    console.error('Terjadi kesalahan:', error);
                }
            }

            const sepa = new Flip({
                node: $(".separate")[0], // Pastikan elemen ditemukan dan gunakan referensi DOM langsung
                from: count,
            });

            const $selectElement = $("#id_hadiah");
            const $startButton = $(".start");

            // Event listener untuk memantau perubahan pada elemen select
            $selectElement.on("change", function() {
                hadiah_status = true;
                $('#id_produk').prop('disabled', false);

                if ($(this).val() !== "" && hadiah_status && produk_status) {
                    // Jika nilai tidak kosong, hapus atribut disabled pada tombol
                    $startButton.prop("disabled", false);
                } else {
                    // Jika nilai kosong, tambahkan kembali atribut disabled
                    $startButton.prop("disabled", true);
                }
            });

            $("#id_produk").on("change", function(){
                produk_status = true;
                produk = $(this).val();

                // Panggil fungsi untuk mengambil data
                fetchNomorRekening($(this).val);

                $("#info_produk").html(produk);
                $("#win_produk").html(produk);
                // Panggil fungsi untuk mengambil data
                fetchNomorRekening($(this).val());

                if ($(this).val() !== "" && hadiah_status && produk_status) {
                    // Jika nilai tidak kosong, hapus atribut disabled pada tombol
                    $startButton.prop("disabled", false);
                } else {
                    // Jika nilai kosong, tambahkan kembali atribut disabled
                    $startButton.prop("disabled", true);
                }
            });

            // reset button on modal
            $("#resetbutton").on("click", function(){
                location.reload();
            });
            // Handle tombol Start
            $(".start").on("click", function() {
                startUndian();
            });

            // Handle tombol Stop
            $(".stop").on("click", function() {
                stopUndian();
                getWinner(winner);
            });

            function getRandomFromArray(arr) {
                const randomIndex = Math.floor(Math.random() * arr.length);
                return arr[randomIndex];
            }

            function startUndian() {
                // Sembunyikan tombol Start dan tampilkan tombol Stop
                $('.start').addClass("hidden");
                $(".stop").removeClass("hidden");
                // Disable select #id_hadiah
                $("#id_hadiah").prop("disabled", true);
                $("#id_produk").prop("disabled", true);

                // Mulai interval
                intervalId = setInterval(() => {
                    number = getRandomFromArray(randomNumbers);
                    sepa.flipTo({
                        to: number
                    });

                    winner = number;
                }, 360); // Ganti angka setiap 500ms
            }

            function stopUndian() {
                // Sembunyikan tombol Stop dan tampilkan tombol Start
                $(".stop").addClass("hidden");
                $(".start").removeClass("hidden");

                $(".start").prop("disabled", true);

                // Hentikan interval
                clearInterval(intervalId);
                intervalId = null; // Reset intervalId

                getConfetti();
                confetti();

                setTimeout(function() {
                    // Menampilkan modal setelah 1 detik
                    const modal = document.getElementById("my_modal_3");
                    modal.showModal();
                }, 6000); // Delay 1 detik
            }

            function getWinner(winner) {
                // Menggunakan Axios untuk request ke API
                axios.get(`${window.location.origin}/api/kupon-deposito/${winner}`)
                    .then(function(response) {
                        // Menangani respons dari API
                        console.log('Data berhasil diambil:', response.data);
                        // Lakukan sesuatu dengan data yang diterima, misalnya menampilkan data
                        const data = response.data.data;
                        //console.log('Data kupon:', data);

                        $('#winner_kupon').html("NOMOR UNDIAN : " + data.kupon);
                        $('#winner_nama').html(data.nama_nasabah);
                        $('#winner_nomor_rekening').html(data.nomor_rekening);
                        $('#winner_alamat').html(data.alamat);

                        $("#winner_no_kupon").val(data.kupon);
                        $("#winner_id_peserta").val(data.id);
                        $("#winner_nama_nasabah").val(data.nama_nasabah);
                        $("#winner_nomor_cif").val(data.nomor_cif);
                        $("#winner_no_rekening").val(data.nomor_rekening);
                        $("#winner_jumlah_kupon").val(data.total_kupon);
                        $("#winner_saldo_akhir").val(data.saldo_akhir);
                        $("#winner_alamat_nasabah").val(data.alamat);
                        $("#winner_no_ktp").val(data.no_ktp);
                        

                    })
                    .catch(function(error) {
                        // Menangani error jika request gagal
                        console.error('Terjadi kesalahan:', error);
                        if (error.response) {
                            console.log('Status error:', error.response.status);
                            console.log('Pesan error:', error.response.data.message);
                        } else {
                            console.log('Tidak ada respons dari server');
                        }
                    }); 
            }
        });
    </script>
</body>
</html>
