<x-filament-panels::page>
    @if (session('success'))
        <div class="alert alert-success bg-blue-500 text-white p-4 rounded-md shadow-md mb-4" style="color:rgb(29, 78, 216);background-color: rgb(239, 246, 255)">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M5 12l2 2 4-4M21 12l-2 2-4-4M17 12l-2 2-4-4"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    <form action="{{ route('generate.kupon.deposito') }}" method="post" class="bg-white space-y-4 p-4 border rounded-lg shadow-sm max-w-lg">
        @csrf
        <div class="flex flex-col">
            <label for="saldo-kupon" class="mb-2 text-lg font-medium text-gray-700">Saldo Kupon<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup></label>
            <input type="text" id="saldo-kupon" name="saldo_kupon" required class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="100,000" value="100000">
        </div>
        
        <div class="p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700" role="alert" style="color:rgb(161, 98, 7);background-color:rgb(254, 252, 232);border:1px solid rgba(250,204,21,0.4);border-left:4px solid rgb(250,204,21);display:block;">
            <p class="font-bold">Perhatian:</p>
            <p>Dengan melakukan generate, maka semua voucher yang sudah ada sebelumnya akan terhapus secara otomatis.</p>
            <br>
            <p>Tolong gunakan tool ini dengan hati-hati.</p>
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" id="saya-mengerti" name="saya_mengerti" required class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-2 focus:ring-blue-500">
            <label for="saya-mengerti" class="text-gray-700"> &nbsp; Saya Mengerti<sup class="text-danger-600 dark:text-danger-400 font-medium">*</sup></label>
        </div>
        
        <button type="submit" style="--c-400:var(--info-400);--c-500:var(--info-500);--c-600:var(--info-600);" class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-info fi-size-lg fi-btn-size-lg gap-1.5 px-3.5 py-2.5 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50" type="button" wire:loading.attr="disabled">
            <!--[if BLOCK]><![endif]-->        <!--[if BLOCK]><![endif]-->            <!--[if BLOCK]><![endif]-->    <svg class="fi-btn-icon transition duration-75 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
          <path d="M15.98 1.804a1 1 0 0 0-1.96 0l-.24 1.192a1 1 0 0 1-.784.785l-1.192.238a1 1 0 0 0 0 1.962l1.192.238a1 1 0 0 1 .785.785l.238 1.192a1 1 0 0 0 1.962 0l.238-1.192a1 1 0 0 1 .785-.785l1.192-.238a1 1 0 0 0 0-1.962l-1.192-.238a1 1 0 0 1-.785-.785l-.238-1.192ZM6.949 5.684a1 1 0 0 0-1.898 0l-.683 2.051a1 1 0 0 1-.633.633l-2.051.683a1 1 0 0 0 0 1.898l2.051.684a1 1 0 0 1 .633.632l.683 2.051a1 1 0 0 0 1.898 0l.683-2.051a1 1 0 0 1 .633-.633l2.051-.683a1 1 0 0 0 0-1.898l-2.051-.683a1 1 0 0 1-.633-.633L6.95 5.684ZM13.949 13.684a1 1 0 0 0-1.898 0l-.184.551a1 1 0 0 1-.632.633l-.551.183a1 1 0 0 0 0 1.898l.551.183a1 1 0 0 1 .633.633l.183.551a1 1 0 0 0 1.898 0l.184-.551a1 1 0 0 1 .632-.633l.551-.183a1 1 0 0 0 0-1.898l-.551-.184a1 1 0 0 1-.633-.632l-.183-.551Z"></path>
        </svg>            
            <span class="fi-btn-label">
                Generate
            </span>
        </button>
        </form>

        <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
        <script>
            // Inisialisasi Cleave.js untuk input dengan separator ribuan
            new Cleave('#saldo-kupon', {
              numeral: true,
              numeralThousandsGroupStyle: 'thousand'
            });
        </script>
</x-filament-panels::page>
