<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Edit') }}
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
                    
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Kategori Produk</label>
                            <div class="col sm-9">
                                <select name="kategori_id" class="form-control">
                                    @foreach ($product_kategori as $pk)
                                        @if ( $product->kategori_id == $pk->id)
                                            <option value="{{ $pk->id }}" selected>{{ $pk->name }}</option>
                                            @else 
                                            <option value="{{ $pk->id }}">{{ $pk->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-3">Nama Produk</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" >
                                @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                                @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
                                @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Stok</label>
                            <div class="col-sm-9">
                                <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ $product->stok }}">
                                @error('stok')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Status</label>
                            <div class="col sm-9">
                                <select name="status" class="form-control">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Foto</label>
                            <div class="col-sm-9">
                            @if ($product->photo)
                                <a href="{{ $product->photo_url }}" target="_blank">
                                    <img src="{{ $product->photo_url }}" alt="{{ $product->name }}" width="100">
                                </a>
                            @endif
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
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
