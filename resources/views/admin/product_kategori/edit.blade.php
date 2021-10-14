<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori Product Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                             <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('product_kategori.update', $product_kategori->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-3">Nama Kategori Produk</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product_kategori->name }}" >
                                @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Status</label>
                            <div class="col sm-9">
                                <select name="status" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Non Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Icon</label>
                            <div class="col-sm-9">
                            @if ($product_kategori->icon)
                                <a href="{{ $product_kategori->photo_url }}" target="_blank">
                                    <img src="{{ $product_kategori->photo_url }}" alt="{{ $product_kategori->name }}" width="100">
                                </a>
                            @endif
                                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror">
                                @error('icon')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3"></label>
                            <button type="submit" class="btn btn-primary" @error('title') is-invalid @enderror>
                                Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
