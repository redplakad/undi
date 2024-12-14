<x-filament-panels::page>
    @if (session('success'))
        <div class="alert alert-success bg-blue-500 text-white p-4 rounded-md shadow-md mb-4" style="color:rgb(29, 78, 216);background-color: rgb(239, 246, 255)">
            <div class="flex items-center">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <ul class="list-disc ml-5 mt-2">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z"/></svg>
        </span>
    </div>
@endif

<div class="w-full bg-white p-6 rounded shadow">
<center>
    <div class="animate-pulse number-flip" id="myNumber" style="font-size: 148px; position: relative; overflow: hidden; height: 222px;"><div class="ctnr ctnr0" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr1" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr2" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr3" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr4" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr5" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr6" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr7" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr8" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr9" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr10" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div><div class="ctnr ctnr11" style="position: relative; display: inline-block; vertical-align: top; transform: translateY(0px);"><div class="digit">0</div><div class="digit">1</div><div class="digit">2</div><div class="digit">3</div><div class="digit">4</div><div class="digit">5</div><div class="digit">6</div><div class="digit">7</div><div class="digit">8</div><div class="digit">9</div><div class="digit">0</div></div></div>
</center>
</div>

<div class="w-full">
        <div class="bg-white mx-auto p-6 rounded shadow">
                <!-- Select Daftar Hadiah -->
            <div class="mb-4">
                <label for="id_hadiah" class="block text-gray-700 font-medium mb-2">Pilih Hadiah</label>
                <select id="id_hadiah" name="id_hadiah" class="block w-full bg-gray-100 border border-gray-300 rounded px-3 py-2">
                    <option value="">-- Pilih Hadiah --</option>
                    @foreach (DB::table('daftar_hadiah')->where('jumlah_hadiah','>',0)->get() as $hadiah)
                        <option value="{{ $hadiah->id }}">{{ $hadiah->nama_hadiah }} - Hadiah {{ $hadiah->level_hadiah }} | {{ $hadiah->jumlah_hadiah }}pcs</option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="p-6 center">
            <center>
                <button id="mulai" type="button" style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" type="button" wire:loading.attr="disabled" disabled>
                    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->    <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z"></path>
                </svg>            
                    <span class="fi-btn-label">
                        Mulai Undian
                    </span>
                </button>

                <a href="" id="reset" type="button" style="--c-400:var(--warning-400);--c-500:var(--warning-500);--c-600:var(--warning-600);" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-warning fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" type="button" wire:loading.attr="disabled" disabled>
                    <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->    <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z"></path>
                </svg>            
                    <span class="fi-btn-label">
                        Reset
                    </span>
                </a>
                
            <input type="hidden" name="no_kupon" id="no_kupon">
            </center>
        </div>

        <!-- Submit Button -->
<!-- Modal Background -->
<div id="kuponModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden" style="margon-top:200px;background-color: rgba(31, 41, 55, 0.5);z-index:9999">
    <!-- Modal Container -->
    <div class="bg-white rounded-lg shadow-lg w-1/2 max-w-md mx-auto">
        <!-- Modal Header -->
        <div class="flex justify-between items-center border-b p-4">
            <h2 class="text-xl font-semibold">SELAMAT KEPADA PEMENANG</h2>
            <button class="text-gray-600 hover:text-gray-900" onclick="closeModal()"  type="button">✖</button>
        </div>
        <!-- Modal Body -->
        <div class="p-4" id="kupon">
            <center>
            <h1 id="no_kupon_modal" style="font-size: 48px"></h1>
            <!-- Image -->
            <div class="flex justify-center mb-4">
                <img src="" alt="Foto Hadiah" id="fotoHadiah" class="w-48 h-auto rounded">
            </div>

            
            <h2 id="nama_hadiah" style="font-size: 36px"></h1>
            </center>
            <br>
            <hr>
            <br>
            <!-- Table -->
            <table class="table-auto w-full">
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Nomor Kupon</td>
                    <td>:</td>
                    <td class="text-sm" id="nomor_kupon"></td>
                </tr>
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Nama Nasabah</td>
                    <td>:</td>
                    <td class="text-sm" id="nama_nasabah"></td>
                </tr>
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Nomor CIF</td>
                    <td>:</td>
                    <td class="text-sm" id="nomor_cif"></td>
                </tr>
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Nomor Rekening</td>
                    <td>:</td>
                    <td class="text-sm" id="nomor_rekening"></td>
                </tr>
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Saldo</td>
                    <td>:</td>
                    <td class="text-sm" id="saldo"></td>
                </tr>
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Jumlah Kupon</td>
                    <td>:</td>
                    <td class="text-sm" id="jumlah_kupon"></td>
                </tr>
                <tr>
                    <td class="text-sm text-gray-500 pr-2">Alamat</td>
                    <td>:</td>
                    <td class="text-sm" id="alamat"></td>
                </tr>
            </table>
        </div>
        <div class="flex">

        </div>
        <!-- Modal Footer -->
        <div class="flex justify-end border-t p-4">
            <form action="{{ route('pengundian.simpan.tabungan') }}" method="post">
                @csrf
                <!-- Hidden inputs -->
                <input type="hidden" name="form_id_peserta" id="form_id_peserta">
                <input type="hidden" name="form_id_hadiah" id="form_id_hadiah">
                <input type="hidden" name="form_no_kupon" id="form_no_kupon">
                <input type="hidden" name="form_jenis_hadiah" id="form_jenis_hadiah">
                <input type="hidden" name="form_nama_hadiah" id="form_nama_hadiah">
                <input type="hidden" name="form_nama_nasabah" id="form_nama_nasabah">
                <input type="hidden" name="form_jumlah_kupon" id="form_jumlah_kupon">
                <input type="hidden" name="form_nomor_cif" id="form_nomor_cif">
                <input type="hidden" name="form_nomor_rekening" id="form_nomor_rekening">
                <input type="hidden" name="form_saldo" id="form_saldo">
                <input type="hidden" name="form_no_ktp" id="form_no_ktp">
                <input type="hidden" name="form_alamat" id="form_alamat">
                
                <center>
                    <button id="mulai" type="submit" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" style="background-color:rgb(37, 99, 235) !important">
                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z"></path>
                        </svg>
                        <span class="fi-btn-label">Simpan Pemenang</span>
                    </button>
        
                    <a href="" id="reset" type="button" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-warning fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" style="background-color:rgb(217, 119, 6)">
                        <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z"></path>
                        </svg>
                        <span class="fi-btn-label">Reset</span>
                    </a>
                </center>
            </form>
        </div>
    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/number-flip/dist/number-flip.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
<script>
    $("#id_hadiah").change(function(){
        getRandomKupon();

        document.getElementById('fotoHadiah').src = "";
        var id = $('#id_hadiah').val();
        getHadiah(id);

        setTimeout(function() {
            $('#mulai').prop('disabled', false);
        }, 1000);
    });
    $("#mulai").click(function(){
        $('#mulai').prop('disabled', true);
        $('#myNumber').html("");
        nokupon = $('#nomor_kupon').text();
        new Flip({
            node: myNumber,
            from: 999999999999,
            to: nokupon,
            delay: 1, // second
            duration: 10,
            easeFn: function(pos) {
                if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,3);
                return 0.5 * (Math.pow((pos-2),3) + 2);
            },
        });

        getConfetti();
    });
    // Fungsi untuk mendapatkan kupon random
    function getRandomKupon() {
        document.getElementById('mulai').addEventListener('click', function() {
            document.getElementById('pemenangModal').classList.remove('hidden');
        });

        // Function to close the modal

        // Menggunakan fetch untuk memanggil API
        fetch('{{ route('api.get.kupon.tabungan') }}')
            .then(response => response.json()) // Mengubah response menjadi JSON
            .then(data => {
                if (data.status === 'success') {
                    // Jika berhasil, tampilkan data kupon
                    const kupon = data.data;

                    nokupon = kupon.kode_kupon;

                    $('#no_kupon_modal').html(kupon.kode_kupon);

                    $('#no_kupon').val(kupon.kode_kupon);
                    $('#nomor_kupon').html(kupon.kode_kupon);
                    $('#nama_nasabah').html(kupon.nama_nasabah);
                    $('#nomor_cif').html(kupon.nomor_cif);
                    $('#nomor_rekening').html(kupon.nomor_rekening);
                    $('#saldo').html(kupon.saldo_akhir);
                    $('#jumlah_kupon').html(kupon.jumlah_kupon);
                    $('#alamat').html(kupon.alamat);

                    $('#form_id_peserta').val(kupon.noid_peserta);
                    $('#form_no_kupon').val(kupon.kode_kupon);
                    $('#form_jenis_hadiah').val(kupon.jenis_hadiah);
                    $('#form_nama_hadiah').val(kupon.nama_hadiah);
                    $('#form_nama_nasabah').val(kupon.nama_nasabah);
                    $('#form_jumlah_kupon').val(kupon.jumlah_kupon);
                    $('#form_nomor_cif').val(kupon.nomor_cif);
                    $('#form_nomor_rekening').val(kupon.nomor_rekening);
                    $('#form_saldo').val(kupon.saldo_akhir);
                    $('#form_no_ktp').val(kupon.no_ktp);
                    $('#form_alamat').val(kupon.alamat);

                } else {
                    // Jika gagal, tampilkan pesan error
                    document.getElementById('kupon').innerHTML = `<p>${data.message}</p>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('kupon').innerHTML = `<p>Terjadi kesalahan saat mengambil data.</p>`;
            });
    }

    function getConfetti(){
        const jsConfetti = new JSConfetti();

        setTimeout(function() {
            const jsConfetti = new JSConfetti();
            jsConfetti.addConfetti({
                emojis: ['🌈', '⚡️', '💥', '✨', '💫', '🌸'],
            });
        }, 8000);
        setTimeout(function() {
            const jsConfetti = new JSConfetti();
            jsConfetti.addConfetti({
                confettiColors: [
                    '#00a8cc', '#FF4500', '#ff477e', '#00a896', '#02c39a', '#FF7F50'
                ],
                confettiRadius: 5,
                confettiNumber: 8000,
            });
        }, 9000);
        setTimeout(function() {
            const jsConfetti = new JSConfetti();
            jsConfetti.addConfetti({
                confettiColors: [
                    '#ff0a54', '#FF7F50', '#ff7096', '#ff85a1', '#FF4500', '#f9bec7',
                ],
                confettiRadius: 8,
                confettiNumber: 1000,
            });
        }, 9500);
        setTimeout(function() {
            const jsConfetti = new JSConfetti();
            jsConfetti.addConfetti({
                confettiColors: [
                    '#FF5733', '#FF7F50', '#FFA500', '#FF6347', '#FF4500','#DC143C',
                ],
                confettiRadius: 12,
                confettiNumber: 1500,
            });
        }, 10000);

        setTimeout(function() {
            openModal();
        }, 11000);
    }

    function getHadiah(id){
        fetch(`{{ url('api/hadiah') }}/${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Ganti src elemen img dengan ID `fotoHadiah`
                    document.getElementById('fotoHadiah').src = '{{ env('APP_URL') }}/storage/' + data.data.gambar_hadiah;
                    $('#nama_hadiah').html(data.data.nama_hadiah);
                    $('#form_nama_hadiah').val(data.data.nama_hadiah);
                    $('#form_jenis_hadiah').val(data.data.level_hadiah);

                    
                    $('#form_id_hadiah').val(data.data.id);
                } else {
                    console.error('Data tidak ditemukan:', data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function openModal() {
        document.getElementById('kuponModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        document.getElementById('kuponModal').classList.add('hidden');
    }

</script>
</x-filament-panels::page>
