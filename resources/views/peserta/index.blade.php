<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Peserta') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12 bg-[url('/images/bg.png')]">
            <div class="container mx-auto p-4 bg-white shadow-l rounded">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="container mx-auto p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <form action="{{ route('peserta.index') }}" method="GET" class="me-2">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari peserta..."
                                    value="{{ request('search') }}"> &nbsp;
                                <button class="btn btn-primary" type="submit">Cari</button>
                                @if(isset($_REQUEST['search']))
                                <a href="{{ route('peserta.index') }}" class="btn btn-default">Reset</a>
                                @endif
                            </div>
                        </form>
                    
                        <a href="{{ route('peserta.create') }}" class="btn btn-primary">Tambah Peserta</a>
                    </div>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NOREK</th>
                                <th>NAMA</th>
                                <th>KOTA</th>
                                <th>NO IDENTITAS</th>
                                <th>JENIS PRODUK</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peserta as $item)
                                <tr>
                                    <td>{{ $item->NOREK }}</td>
                                    <td>{{ $item->NAMA }}</td>
                                    <td>{{ $item->KOTA }}</td>
                                    <td>{{ $item->NO_IDENTITAS }}</td>
                                    <td>{{ $item->JENIS_PRODUK }}</td>
                                    <td>
                                        <a href="{{ route('peserta.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('peserta.destroy', $item->id) }}" method="POST"
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
                        {{ $peserta->links() }} <!-- Menampilkan tautan pagination -->
                    </div>
                </div>
            </div>
        @endsection
</x-app-layout>
