<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pemanang Hadiah
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('winners.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <input type="hidden" name="voucher_id" id="voucher_id" class="form-control" value="1" required>
                            </div>

                            <div class="col-md-12 col-lg-12 col-sm-12 row">
                                <div class="col-md-6">
                                    <label for="region_id" class="block text-gray-700">Wilayah</label>
                                    <input type="hidden" name="region_id" value=''>
                                    <select name="region" id="region_id" class="form-control select2" required>
                                            <option selected>Pilih Kota/Kab terlebih dahulu</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->kota }}">{{ $region->kota }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="prize_id" class="block text-gray-700">Hadiah</label>
                                    <select name="prize_id" id="prize_id" class="form-control select2" required>
                                            <option selected>Pilih Hadiah terlebih dahulu</option>
                                        @foreach($prizes as $prize)
                                            <option value="{{ $prize->id }}">{{ $prize->nama_hadiah }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <div id="fireworks"></div>
                            <div id="confetti"></div>

                            <center>
                                <div id="myNumber" class="flip" style="font-size: 148px;"></div>


                                <br/>
                                <br/>

                                <button type="button" class="btn btn-lg btn-primary" id="mulai" disabled><i class="fas fa-play"></i> Mulai!</button>
                                <button type="button" class="btn btn-lg btn-light" id="reset"><i class="fas fa-repeat"></i> Reset</button>
                                <a href="{{ route('winners.index') }}" class="btn btn-lg btn-light"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </center>
                            <br/>
                            <br/>
                            <br/>
                            <div class="mb-4">
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Pemenang Undian</h5>
                                        <button type="button" class="close float-left" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="result" style="font-size: 78px;"></div>

                                        <div class="col-md-12">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td id="dNama"></td>
                                                </tr>
                                                <tr>
                                                    <td>No Kupon</td>
                                                    <td>:</td>
                                                    <td id="dNorek"></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td id="dKota"></td>
                                                </tr>
                                                <tr>
                                                    <td>No Identitas</td>
                                                    <td>:</td>
                                                    <td id="dIden"></td>
                                                </tr>
                                            </table>

                                            <br/>
                                            <br/>
                                            <br/>
                                            <img id="fotoContainer" src="" alt="Foto Hadiah" style="max-width: 450px;max-height:350px";/>
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        <a href="{{ route('winners.create') }}" class="btn btn-xl btn-light" id="reset"><i class="fas fa-repeat"></i> Reset</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            prize_id = 1;
            // Ambil elemen HTML yang akan dianimasikan
            const myNumber = document.getElementById('myNumber');

            async function fetchFotoBySlug(slugId) {
                try {
                    // Mengambil foto berdasarkan slug ID
                    const response = await fetch("{{ route('hadiah.index') }}s/" + slugId);

                    // Memeriksa apakah permintaan berhasil
                    if (!response.ok) {
                        throw new Error('Hadiah tidak ditemukan');
                    }

                    // Mengambil data JSON dari respons
                    const data = await response.json();

                    // Memproses data yang diterima
                    if (data.success) {
                        //console.log('Foto:', data.foto);
                        // Anda dapat melakukan sesuatu dengan data.foto, misalnya menampilkan di UI
                        document.getElementById('fotoContainer').src = data.foto; // Misalnya, menampilkan di elemen img
                    } else {
                        console.error(data.message);
                    }
                } catch (error) {
                    console.error('Terjadi kesalahan:', error.message);
                }
            }
            // Buat instance NumberFlip
            $(document).ready(function(){
                var btn_1 = 0;
                var btn_2 = 0;
                $('#region_id').change(function(){
                    btn_1 = 1;
                    var slugKota = $(this).val();

                // Mengirim permintaan AJAX
                    $.ajax({
                        url: '/peserta/kota/' + slugKota, // Encode slug untuk URL
                        method: 'GET',
                        success: function(data) {
                            $('#voucher_id').val(data.id);
                            $('#dNorek').text(data.NOREK);
                            $('#dNama').text(data.NAMA);
                            $('#dKota').text(data.KOTA);
                            $('#dIden').text(data.NO_IDENTITAS);

                            if (data.length > 0) {
                                console.log(data);
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr.responseText);
                            //alert('Terjadi kesalahan saat mengambil data.');
                        }
                    });

                    if(btn_1 == 1 && btn_2 == 1){
                        $("#mulai").prop('disabled', false);
                    }
                });
                $('#prize_id').change(function() {
                        btn_2 = 1;
                        // Mengambil nilai yang dipilih
                        prize_id = $(this).val();

                        // Anda dapat melakukan sesuatu dengan prizeId di sini

                        if(btn_1 == 1 && btn_2 == 1){
                            $("#mulai").prop('disabled', false);
                        }

                 });
                $("#mulai").click(function(){
                    norek = $('#dNorek').text();
                    $('#myNumber').html("");
                    $('#mulai').prop('disabled', true);
                    new Flip({
                        node: myNumber,
                        from: 999999999,
                        to: norek,
                        delay: 1, // second
                        duration: 10,
                        easeFn: function(pos) {
                            if ((pos/=0.5) < 1) return 0.5*Math.pow(pos,3);
                            return 0.5 * (Math.pow((pos-2),3) + 2);
                        },
                    });


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
                    }, 9500);setTimeout(function() {
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
                        let prize = $('#prize_id').val();
                        fetchFotoBySlug(prize);
                        $('#result').html({{ $peserta->no_rek }});
                        $('#myModal').modal('show');
                    }, 11000);
                });
                $('.close').click(function(){
                    $('#myModal').modal('hide');
                });

                $("#reset").click(function(){
                    location.reload();
                });


            });
        </script>
    @endpush
    @push('style')
        <script src="https://cdn.jsdelivr.net/npm/number-flip/dist/number-flip.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/number-flip@2.1.1/dist/number-flip.min.css">
    @endpush
</x-app-layout>
