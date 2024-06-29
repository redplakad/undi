<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12 bg-[url('/images/bg,png')]">
            <div class="container mx-auto p-4">

                <div class="text-center">

                    <h1 class="text-4xl font-bold tracking-tight sm:text-6xl text-blue-900">UNDIAN KREDIT BERHADIAH TAHUN
                        2024</h1>
                        <br />
                    <center>
                        <img src="/images/logo.png" style="height:80px;width:auto;text-align:center;">
                    </center>
                    <br />
                    <br />
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <br />
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4">
                    <!-- Column 1 -->
                    <div class="flex flex-col justify-between bg-white shadow-xl rounded p-4">
                        <figure class="flex-grow">
                            <img src="/images/people.png" alt="Daftar Peserta" class="w-full h-auto" />
                        </figure>
                        <div class="flex justify-center mt-4">
                            <button class="btn btn-primary py-2 px-4 rounded">DAFTAR PESERTA</button>
                        </div>
                    </div>
                    <!-- Column 2 -->
                    <div class="flex flex-col justify-between bg-white shadow-xl rounded p-4">
                        <figure class="flex-grow">
                            <img src="/images/gift.png" alt="Data Undian" class="w-full h-auto" />
                        </figure>
                        <div class="flex justify-center mt-4">
                            <button class="btn btn-primary py-2 px-4 rounded">DATA UNDIAN</button>
                        </div>
                    </div>
                    <!-- Column 3 -->
                    <div class="flex flex-col justify-between bg-white shadow-xl rounded p-4">
                        <figure class="flex-grow">
                            <img src="/images/map.png" alt="Data Wilayah" class="w-full h-auto" />
                        </figure>
                        <div class="flex justify-center mt-4">
                            <button class="btn btn-primary py-2 px-4 rounded">DATA WILAYAH</button>
                        </div>
                    </div>
                    <!-- Column 4 -->
                    <div class="flex flex-col justify-between bg-white shadow-xl rounded p-4">
                        <figure class="flex-grow">
                            <img src="/images/start.png" alt="Jalankan Undian" class="w-full h-auto" />
                        </figure>
                        <div class="flex justify-center mt-4">
                            <a href="{{ route('winners.create') }}" class="btn btn-primary py-2 px-4 rounded">JALANKAN
                                UNDIAN</a>
                        </div>
                    </div>

                    <br />

                </div>

                <div class="py-12">
                    <div class="container mx-auto p-4">
                        <div class="flex items-center justify-center space-x-4">
                            <!-- Column 1 -->
                            <div class="flex flex-col justify-between rounded">
                                <figure class="flex-grow">
                                    <img src="/images/ojk.png" class="h-auto" style="height:35px; width:auto;" />
                                </figure>
                            </div>
                            <!-- Column 2 -->
                            <div class="flex flex-col justify-between rounded">
                                <figure class="flex-grow">
                                    <img src="/images/bi.png" class="h-auto" style="height:35px; width:auto;" />
                                </figure>
                            </div>
                            <!-- Column 3 -->
                            <div class="flex flex-col justify-between rounded">
                                <figure class="flex-grow">
                                    <img src="/images/lps.png" class="h-auto" style="height:35px; width:auto;" />
                                </figure>
                            </div>
                            <!-- Column 4 -->
                            <div class="flex flex-col justify-between rounded">
                                <figure class="flex-grow">
                                    <img src="/images/perbamida.png" class="h-auto" style="height:35px; width:auto;" />
                                </figure>
                            </div>
                            <!-- Column 5 -->
                            <div class="flex flex-col justify-between rounded">
                                <figure class="flex-grow">
                                    <img src="/images/perbarindo.png" class="h-auto" style="height:35px; width:auto;" />
                                </figure>
                            </div>
                            <!-- Column 6 -->
                            <div class="flex flex-col justify-between rounded">
                                <figure class="flex-grow">
                                    <img src="/images/baturaja.png" class="h-auto" style="height:35px; width:auto;" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
</x-app-layout>
