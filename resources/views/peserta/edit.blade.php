<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Peserta') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12 bg-[url('/images/bg.png')]">
            <div class="container mx-auto p-4 bg-white shadow-l rounded w-50">
                <form action="{{ route('peserta.update', $peserta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="NOREK">NOREK</label>
                        <input type="text" name="NOREK" class="form-control" value="{{ $peserta->NOREK }}" required>
                    </div>
                    <div class="form-group">
                        <label for="NAMA">NAMA</label>
                        <input type="text" name="NAMA" class="form-control" value="{{ $peserta->NAMA }}" required>
                    </div>
                    <div class="form-group">
                        <label for="KOTA">KOTA</label>
                        <input type="text" name="KOTA" class="form-control" value="{{ $peserta->KOTA }}" required>
                    </div>
                    <div class="form-group">
                        <label for="NO_IDENTITAS">NO IDENTITAS</label>
                        <input type="text" name="NO_IDENTITAS" class="form-control" value="{{ $peserta->NO_IDENTITAS }}" required>
                    </div>
                    <div class="form-group">
                        <label for="JENIS_PRODUK">JENIS PRODUK</label>
                        <input type="text" name="JENIS_PRODUK" class="form-control" value="{{ $peserta->JENIS_PRODUK }}" required>
                    </div>
                    <div class="form-group">
                        <label for="STATUS">STATUS</label>
                        <input type="text" name="STATUS" class="form-control" value="{{ $peserta->STATUS }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>