<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Pemenang
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('winners.index') }}" method="GET" class="mb-4">
                            <div class="col-md-8 col-sm-12 flex items-center">
                                <input type="text" name="search" placeholder="Search..." class="form-control" value="{{ $search ?? '' }}">
                                &nbsp;
                                <button type="submit" class="btn btn-light ml-2"><i class="fas fa-search"></i> Search</button>
                                &nbsp;
                                <a href="{{ route('winners.create') }}" class="btn btn-primary"><i class="fas fa-play"></i> Mulai</a>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No Rekening</th>
                                    <th>No Identitas</th>
                                    <th>Nama</th>
                                    <th>Hadiah</th>
                                    <th>Kota</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($winners as $winner)
                                <tr>
                                    <td>{{ $winner->voucher->NOREK }}</td>
                                    <td>{{ $winner->voucher->NO_IDENTITAS }}</td>
                                    <td>{{ $winner->voucher->NAMA}}</td>
                                    <td>{{ $winner->prize ? $winner->prize->nama_hadiah : 'Error: Hadiah tidak ditemukan' }}</td>
                                    <td>{{ $winner->region_id }}</td>
                                    <td>

                                        <form action="{{ route('winners.destroy', $winner->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $winners->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
