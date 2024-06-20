<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Vouchers
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('vouchers.index') }}" method="GET" class="mb-4">
                            <div class="col-md-8 col-sm-12 flex items-center">
                                <input type="text" name="search" placeholder="Search..." class="form-control">
                                &nbsp;
                                <button type="submit" class="btn btn-primary ml-2">Search</button>
                                &nbsp;
                                <a href="{{ route('vouchers.create') }}" class="btn btn-primary ml-2">Tambah</a>
                                &nbsp;
                                <a href="{{ route('vouchers.import.form') }}" class="btn btn-primary ml-2">Import</a>
        
                            </div>
                        </form>


                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No. Rek</th>
                                    <th>No. Kupon</th>
                                    <th>Nama</th>
                                    <th>Area</th>
                                    <th>Plafon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->no_rek }}</td>
                                    <td>{{ $voucher->no_kupon }}</td>
                                    <td>{{ $voucher->nama }}</td>
                                    <td>{{ $voucher->area }}</td>
                                    <td>{{ number_format($voucher->plafon,0) }}</td>
                                    <td>
                                        <a href="{{ url('/vouchers/' . $voucher->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ url('/vouchers/' . $voucher->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $vouchers->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
