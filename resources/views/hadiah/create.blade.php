<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Hadiah') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12 bg-[url('/images/bg.png')]">
            <div class="container mx-auto p-4 bg-white shadow-l rounded w-50">

                <div class="container mx-auto p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('hadiah.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_hadiah" class="form-label">Nama Hadiah</label>
                            <input type="text" name="nama_hadiah" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="stok_hadiah" class="form-label">Stok Hadiah</label>
                            <input type="number" name="stok_hadiah" class="form-control" required>
                        </div>
                        <div class="mb-4">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="level" class="form-label">Level</label>
                            <select name="level" id="level">
                                <option value="0" selected>Pilih Jenis Hadiah</option>
                                <option value="1">Hadiah Utama</option>
                                <option value="2">Hadiah Kedua</option>
                                <option value="3">Hadiah Ketiga</option>
                                <option value="4">Hadiah Hiburan</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('hadiah.index') }}" class="btn-sm btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

