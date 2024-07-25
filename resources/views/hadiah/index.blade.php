<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Hadiah') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12 bg-[url('/images/bg.png')]">
            <div class="container mx-auto p-4 bg-white shadow-l rounded">

                <div class="container mx-auto p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <form action="{{ route('hadiah.index') }}" method="GET" class="me-2">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari hadiah..."
                                    value="{{ request('search') }}"> &nbsp;
                                <button class="btn btn-primary" type="submit">Cari</button>
                                @if(isset($_REQUEST['search']))
                                <a href="{{ route('hadiah.index') }}" class="btn btn-default">Reset</a>
                                @endif
                            </div>
                        </form>

                        <a href="{{ route('hadiah.create') }}" class="btn btn-primary">Tambah Hadiah</a>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Hadiah</th>
                                <th>Stok Hadiah</th>
                                <th>Foto</th>
                                <th>Keterangan</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hadiah as $item)
                                <tr>
                                    <td>{{ $item->nama_hadiah }}</td>
                                    <td>{{ $item->stok_hadiah }}</td>
                                    <td>
                                        <img src="{{ env('APP_URL') }}/{{ $item->foto }}" alt="{{ $item->nama_hadiah }}" class="w-12 h-12 cursor-pointer" onclick="openModal('{{ $item->foto }}')" />
                                    </td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>
                                        <a href="{{ route('hadiah.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('hadiah.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tautan Pagination -->
                    <div class="mt-4">
                        {{ $hadiah->links() }} <!-- Menampilkan tautan pagination -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
