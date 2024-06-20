<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Prize
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('prizes.update', $prize->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $prize->name }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-700">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $prize->description }}</textarea>
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('prizes.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
