<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Import CSV File
        </h2>
    </x-slot>
    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('vouchers.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="file">Choose CSV File:</label>
                                <br>
                                <input type="file" class="form-control" id="file" name="file">
                                <br>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Import</button>
                            <a href="{{ route('vouchers.index') }}" class="btn btn-md btn-default">Kembali</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
