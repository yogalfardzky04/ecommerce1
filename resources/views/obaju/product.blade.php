@extends('layouts.obaju')
@section('content')
Daftar Produk

<div id="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- breadcrumb-->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li aria-current="page" class="breadcrumb-item active">Ladies</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-3">
          <!--
          *** MENUS AND FILTERS ***
          _________________________________________________________
          -->
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Categories</h3>
            </div>
            <div class="card-body">
              <ul class="nav nav-pills flex-column category-menu">
                    @foreach ($product_kategori as $pk)
                    <li>
                        <a href="{{ route('obaju.product')."?kategori_id=".$pk->id }}" class="nav-link {{ $pk->id==request()->kategori_id?'active':null }}">
                        {{ $pk->name }}
                        </a>
                    </li>
                    @endforeach
                    <li>
                        <a href="{{ route('obaju.product') }}" class="nav-link {{ !request()->kategori_id ? 'active' : null }}">
                        Semua</a>
                    </li>
              </ul>
            </div>
          </div>
          {{-- <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Brands <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Armani  (10)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Versace  (12)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Carlo Bruni  (15)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Jack Honey  (14)
                    </label>
                  </div>
                </div>
                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div>
          <div class="card sidebar-menu mb-4">
            <div class="card-header">
              <h3 class="h4 card-title">Colours <a href="#" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</a></h3>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour white"></span> White (14)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour blue"></span> Blue (10)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour green"></span>  Green (20)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour yellow"></span>  Yellow (13)
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"><span class="colour red"></span>  Red (10)
                    </label>
                  </div>
                </div>
                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
              </form>
            </div>
          </div> --}}
          <!-- *** MENUS AND FILTERS END ***-->
          <div class="banner"><a href="#"><img src="img/banner.jpg" alt="sales 2014" class="img-fluid"></a></div>
        </div>
        <div class="col-lg-9">

          <div class="row products">
            @foreach($products as $p)
            <div class="col-lg-4 col-md-6">
              <div class="product">
                <div class="flip-container">
                  <div class="flipper">
                    <div class="front"><a href="{{ route('obaju.product-detail',$p->id) }}"><img src="{{ $p->photo_url }}" alt="" class="img-fluid"></a></div>
                    <div class="back"><a href="{{ route('obaju.product-detail',$p->id) }}"><img src="{{ $p->photo_url }}" alt="" class="img-fluid"></a></div>
                  </div>
                </div><a href="{{ route('obaju.product-detail',$p->id) }}" class="invisible"><img src="{{ $p->photo_url }}" alt="" class="img-fluid"></a>
                <div class="text">
                  <h3><a href="{{ route('obaju.product-detail',$p->id) }}">{{ $p->name }}</a></h3>
                  <p class="price"> 
                    {{-- <del></del>Rp.{{ number_format($p->price) }} --}}
                    <del></del>Rp. {{ $p->price_format }}
                  </p>
                  <p class="buttons">
                    <form action="{{ route('add-cart') }}" method="POST">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $p->id }}">
                      <input type="hidden" name="quantity" value="1">

                      <a href="{{ route('obaju.product-detail',$p->id) }}" class="btn btn-outline-secondary">View detail</a>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                    </form>
                  </p>
                  
                </div>
                <!-- /.text-->
              </div>
              <!-- /.product            -->
              
            </div>
            @endforeach
            <!-- /.products-->
          </div>
          {{-- <div class="pages">
            <p class="loadMore"><a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a></p>
            <nav aria-label="Page navigation example" class="d-flex justify-content-center">
              <ul class="pagination">
                <li class="page-item"><a href="#" aria-label="Previous" class="page-link"><span aria-hidden="true">«</span><span class="sr-only">Previous</span></a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" aria-label="Next" class="page-link"><span aria-hidden="true">»</span><span class="sr-only">Next</span></a></li>
              </ul>
            </nav>
          </div> --}}
        </div>
        <!-- /.col-lg-9-->
      </div>
    </div>
  </div>
@endsection