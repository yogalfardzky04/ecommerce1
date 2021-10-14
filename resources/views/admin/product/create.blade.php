<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Create') }}
        </h2>
        {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
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
                    
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Kategori Produk</label>
                            <div class="col sm-9">
                                <select name="kategori_id" class="form-control">
                                    @foreach ($product_kategori as $pk)
                                        <option value="{{ $pk->id }}">{{ $pk->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Nama Produk</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" >
                                @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Price</label>
                            <div class="col-sm-9">
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                                @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3">Stok</label>
                            <div class="col-sm-9">
                                <input type="text" name="stok" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}">
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
                                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        {{-- <div class="input-group control-group increment" >
                            <label for="" class="col-sm-3">Foto</label>
                            <input type="file" name="photo[]" class="form-control">
                            <div class="input-group-btn"> 
                              <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Tambah</button>
                            </div>
                          </div>
                          <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="photo[]" class="form-control" style="margin-left:291px">
                              <div class="input-group-btn"> 
                                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Hapus</button>
                              </div>
                            </div>
                          </div> --}}
                          
                        <div class="form-group row">
                            <label for="" class="col-sm-3"></label>
                            <button type="submit" class="btn btn-primary" @error('title') is-invalid @enderror>
                                Simpan
                            </button>
                        </div>
                        {{-- <script type="text/javascript">
                            $(document).ready(function() {
                              $(".btn-success").click(function(){ 
                                  var html = $(".clone").html();
                                  $(".increment").after(html);
                              });
                              $("body").on("click",".btn-danger",function(){ 
                                  $(this).parents(".control-group").remove();
                              });
                            });
                        </script> --}}
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
