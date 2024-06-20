<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List of Prizes
        </h2>
    </x-slot>

    @section('content')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('prizes.index') }}" method="GET" class="mb-4">
                            <div class="col-md-8 col-sm-12 flex items-center">
                                <input type="text" name="search" placeholder="Search..." class="form-control">
                                &nbsp;
                                <button type="submit" class="btn btn-light ml-2">Search</button>
                                &nbsp;
                                <a href="{{ route('prizes.create') }}" class="btn btn-primary ml-2">Tambah</a>
                            </div>
                        </form>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($prizes as $prize)
                                <tr>
                                    <td>{{ $prize->name }}</td>
                                    <td>{{ $prize->description }}</td>
                                    <td>
                                        <a href="{{ route('prizes.edit', $prize->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('prizes.destroy', $prize->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $prizes->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-app-layout>
