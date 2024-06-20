<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <center>
                        <h1>UNDIAN KREDIT BERHADIAH TAHUN 2024</h1>
                        <img src="{{ env('APP_URL') }}/images/logo.png" alt="logo bpr baturaja" style="height:80px;width:auto;">
                    </center>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
</x-app-layout>
