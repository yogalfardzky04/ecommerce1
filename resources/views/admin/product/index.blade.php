<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route('product.create') }}" class="btn btn-primary mb-2">Tambah Produk</a>

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Kategori ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Photo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $p)
                            <tr>
                                <td>
                                    <a href="{{ route('product.edit', $p->id) }}" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('product.destroy', $p->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->user_id }}</td>
                                <td>{{ $p->kategori_id }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td>{{ $p->price }}</td>
                                <td>{{ $p->stok }}</td>
                                <td><img src="{{ $p->photo_url }}" height="200" width="150" alt="{{ $p->name }}"></td>
                                {{-- <td>
                                    @foreach ($products as $ph)
                                    <img src="{{ $ph->photo_url }}" height="200" width="150" alt="{{ $ph->name }}">
                                    @endforeach
                                </td> --}}
                                
                                <td>{{ $p->status }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
