<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Kategori List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 table-responsive">
                    <table class="table table-striped table-bordered">

                    <a href="{{ route('product_kategori.create') }}" class="btn btn-primary mb-2">Tambah Kategori Produk</a>
                    
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th>Icon</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product_kategori as $pk)
                            <tr>
                                <td>
                                    <a href="{{ route('product_kategori.edit', $pk->id) }}" class="btn btn-sm btn-primary">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('product_kategori.destroy', $pk->id) }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-icon">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $pk->id }}</td>
                                <td>{{ $pk->name }}</td>
                                <td>
                                    @if($pk->status == 1)
                                        Aktif
                                    @else
                                        Tidak Aktif
                                    @endif                                    
                                </td>
                                <td> <img src="{{ $pk->photo_url }}" height="200" width="150" alt="{{ $pk->name }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
