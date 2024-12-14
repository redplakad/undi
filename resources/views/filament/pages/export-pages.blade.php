<x-filament-panels::page>
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="bg-white space-y-4 p-4 border rounded-lg shadow-sm max-full">
    <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Keterangan Kupon</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Jumlah Peserta</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Jumlah Kupon</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Baris 1: Kupon Kredit --}}
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">Kupon Kredit</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $jumlahPesertaKredit ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $jumlahKuponKredit ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2">
                        <a href="{{ route('export-kupon-kredit') }}">
                            <button style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" 
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" 
                                type="button" 
                                wire:loading.attr="disabled">
                                Export Kupon
                            </button>
                        </a>
                    </td>
                </tr>

                {{-- Baris 2: Kupon Deposito --}}
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">Kupon Deposito</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $jumlahPesertaDeposito ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $jumlahKuponDeposito ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2">
                        <a href="{{ route('export-kupon-deposito') }}">
                            <button style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" 
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" 
                                type="button" 
                                wire:loading.attr="disabled">
                                Export Kupon
                            </button>
                        </a>
                    </td>
                </tr>

                {{-- Baris 3: Kupon Tabungan --}}
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">Kupon Tabungan</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $jumlahPesertaTabungan ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $jumlahKuponTabungan ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2">
                        <a href="{{ route('export-kupon-tabungan') }}">
                            <button style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" 
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" 
                                type="button" 
                                wire:loading.attr="disabled">
                                Export Kupon
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-filament-panels::page>