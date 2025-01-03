@php
    use App\Models\PesertaKredit;
    use App\Models\PesertaTabungan;
    use App\Models\PesertaDeposito;

    use App\Models\KuponKredit;
    use App\Models\KuponTabungan;
    use App\Models\KuponDeposito;

    use App\Models\PemenangKredit;
    use App\Models\PemenangTabungan;
    use App\Models\PemenangDeposito;

    $totalPesertaKredit = number_format(PesertaKredit::count());
    $totalPesertaTabungan = number_format(PesertaTabungan::count());
    $totalPesertaDeposito = number_format(PesertaDeposito::count());

    $totalKuponKredit = number_format(KuponKredit::count());
    $totalKuponTabungan = number_format(KuponTabungan::count());
    $totalKuponDeposito = number_format(KuponDeposito::count());

    $totalPemenangKredit = number_format(PemenangKredit::count());
    $totalPemenangTabungan = number_format(PemenangTabungan::count());
    $totalPemenangDeposito = number_format(PemenangDeposito::count());
@endphp

<x-filament-panels::page>
    @if (session('message'))
        <div class="alert alert-success bg-blue-500 text-white p-4 rounded-md shadow-md mb-4" style="color:rgb(29, 78, 216);background-color: rgb(239, 246, 255)">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M5 12l2 2 4-4M21 12l-2 2-4-4M17 12l-2 2-4-4"></path>
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        </div>
    @endif
    <div class="bg-white space-y-4 p-4 border rounded-lg shadow-sm max-full">
    <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Produk</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Peserta</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Kupon</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700">Pemenang</th>
                    <th class="border border-gray-200 px-4 py-2 text-left font-bold text-gray-700" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Baris 1: Kupon Kredit --}}
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">Kupon Kredit</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalPesertaKredit ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalKuponKredit ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalPemenangKredit ?? 0 }}</td>
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
                    <td class="border border-gray-200 px-4 py-2">
                        <a href="{{ route('export-pemenang-kredit') }}">
                            <button style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" 
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" 
                                type="button" 
                                wire:loading.attr="disabled">
                                Export Pemenang
                            </button>
                        </a>
                    </td>
                </tr>

                {{-- Baris 2: Kupon Deposito --}}
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">Kupon Deposito</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalPesertaDeposito ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalKuponDeposito ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalPemenangDeposito ?? 0 }}</td>
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
                    <td class="border border-gray-200 px-4 py-2">
                        <a href="{{ route('export-pemenang-deposito') }}">
                            <button style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" 
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" 
                                type="button" 
                                wire:loading.attr="disabled">
                                Export Pemenang
                            </button>
                        </a>
                    </td>
                </tr>

                {{-- Baris 3: Kupon Tabungan --}}
                <tr class="hover:bg-gray-50">
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">Kupon Tabungan</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalPesertaTabungan ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalKuponTabungan ?? 0 }}</td>
                    <td class="border border-gray-200 px-4 py-2 text-gray-700">{{ $totalPemenangTabungan ?? 0 }}</td>
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
                    <td class="border border-gray-200 px-4 py-2">
                        <a href="{{ route('export-pemenang-tabungan') }}">
                            <button style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" 
                                class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" 
                                type="button" 
                                wire:loading.attr="disabled">
                                Export Pemenang
                            </button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</x-filament-panels::page>