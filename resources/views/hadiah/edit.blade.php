<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Hadiah') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12 bg-[url('/images/bg.png')]">
            <div class="container mx-auto p-4 bg-white shadow-l rounded w-50">

                <div class="container mx-auto p-4">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('hadiah.update', $hadiah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="nama_hadiah" class="form-label">Nama Hadiah</label>
                            <input type="text" name="nama_hadiah" class="form-control" value="{{ $hadiah->nama_hadiah }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="stok_hadiah" class="form-label">Stok Hadiah</label>
                            <input type="number" name="stok_hadiah" class="form-control" value="{{ $hadiah->stok_hadiah }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="text" name="foto" class="form-control" value="{{ $hadiah->foto }}">
                        </div>
                        <div class="mb-4">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control">{{ $hadiah->keterangan }}</textarea>
                        </div>
                        <div class="mb-4">
                            <label for="level" class="form-label">Level</label>
                            <input type="number" name="level" class="form-control" value="{{ $hadiah->level }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('hadiah.index') }}" class="btn-sm btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
