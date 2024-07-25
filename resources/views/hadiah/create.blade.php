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
                            <input type="number" name="level" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('hadiah.index') }}" class="btn-sm btn-default">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>

<div id="imageModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-4 rounded">
        <span class="absolute top-0 right-0 p-2 cursor-pointer" onclick="closeModal()">&times;</span>
        <img id="modalImage" src="" alt="" class="max-w-full h-auto" />
    </div>
</div>
@push('scripts')
<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>
@endpush
