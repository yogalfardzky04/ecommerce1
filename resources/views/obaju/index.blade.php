@extends('layouts.obaju')
@section('content')
<div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="main-slider" class="owl-carousel owl-theme">
            <div class="item"><img src="{{ asset('obaju') }}/img/main-slider1.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('obaju') }}/img/main-slider2.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('obaju') }}/img/main-slider3.jpg" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('obaju') }}/img/main-slider4.jpg" alt="" class="img-fluid"></div>
          </div>
          <!-- /#main-slider-->
        </div>
      </div>
    </div>
    <!--
    *** ADVANTAGES HOMEPAGE ***
    _________________________________________________________
    -->
    <div id="advantages">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-heart"></i></div>
              <h3><a href="#">We love our customers</a></h3>
              <p class="mb-0">We are known to provide best possible service ever</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-tags"></i></div>
              <h3><a href="#">Best prices</a></h3>
              <p class="mb-0">You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box clickable d-flex flex-column justify-content-center mb-0 h-100">
              <div class="icon"><i class="fa fa-thumbs-up"></i></div>
              <h3><a href="#">100% satisfaction guaranteed</a></h3>
              <p class="mb-0">Free returns on everything for 3 months.</p>
            </div>
          </div>
        </div>
        <!-- /.row-->
      </div>
      <!-- /.container-->
    </div>
    <!-- /#advantages-->
    <!-- *** ADVANTAGES END ***-->
    <!--
    *** HOT PRODUCT SLIDESHOW ***
    _________________________________________________________
    -->
    <div id="hot">
      <div class="box py-4">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="mb-0">Hot this week</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="product-slider owl-carousel owl-theme">
            @foreach($product_kategori as $pk)
          <div class="item">
            <div class="product">
              <div class="flip-container">
                <div class="flipper">
                  <div class="front"><a href="{{ route('obaju.product')."?kategori_id=".$pk->id }}"><img src="{{ $pk->photo_url }}" alt="" class="img-fluid"></a></div>
                  <div class="back"><a href="{{ route('obaju.product')."?kategori_id=".$pk->id }}"><img src="{{ $pk->photo_url }}" alt="" class="img-fluid"></a></div>
                </div>
              </div><a href="{{ route('obaju.product')."?kategori_id=".$pk->id }}" class="invisible"><img src="{{ $pk->photo_url }}" alt="" class="img-fluid"></a>
              <div class="text">
                <h3><a href="{{ route('obaju.product')."?kategori_id=".$pk->id }}">{{ $pk->name }}</a></h3>
                {{-- <p class="price"> 
                  <del></del>$143.00
                </p> --}}
              </div>
              <!-- /.text-->
              {{-- @if ($pk->is_sale == 1) ini untuk menampilkan icon tulisan kecil sale di kiri gambar --}}
              @if ($pk->status == 1)
              <div class="ribbon sale">
                <div class="theribbon">SALE</div>
                <div class="ribbon-background"></div>
              </div>
              @endif
              {{-- @endif --}}
              <!-- /.ribbon-->
              {{-- <div class="ribbon new">
                <div class="theribbon">NEW</div>
                <div class="ribbon-background"></div>
              </div>
              <!-- /.ribbon-->
              <div class="ribbon gift">
                <div class="theribbon">GIFT</div>
                <div class="ribbon-background"></div>
              </div> --}}
              <!-- /.ribbon-->
            </div>
            <!-- /.product-->
          </div>
            @endforeach
            <!-- /.product-->
          </div>
          <!-- /.product-slider-->
        </div>
        <!-- /.container-->
      </div>
      <!-- /#hot-->
      <!-- *** HOT END ***-->
    </div>
    <!--
    *** GET INSPIRED ***
    _________________________________________________________
    -->
    <div class="container">
      <div class="col-md-12">
        <div class="box slideshow">
          <h3>Get Inspired</h3>
          <p class="lead">Get the inspiration from our world class designers</p>
          <div id="get-inspired" class="owl-carousel owl-theme">
            <div class="item"><a href="#"><img src="{{ asset('obaju') }}/img/getinspired1.jpg" alt="Get inspired" class="img-fluid"></a></div>
            <div class="item"><a href="#"><img src="{{ asset('obaju') }}/img/getinspired2.jpg" alt="Get inspired" class="img-fluid"></a></div>
            <div class="item"><a href="#"><img src="{{ asset('obaju') }}/img/getinspired3.jpg" alt="Get inspired" class="img-fluid"></a></div>
          </div>
        </div>
      </div>
    </div>
    <!-- *** GET INSPIRED END ***-->
    <!--
    *** BLOG HOMEPAGE ***
    _________________________________________________________
    -->
    <div class="box text-center">
      <div class="container">
        <div class="col-md-12">
          <h3 class="text-uppercase">From our blog</h3>
          <p class="lead mb-0">What's new in the world of fashion? <a href="blog.html">Check our blog!</a></p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-12">
        <div id="blog-homepage" class="row">
          <div class="col-sm-6">
            <div class="post">
              <h4><a href="post.html">Fashion now</a></h4>
              <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a></p>
              <hr>
              <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
              <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="post">
              <h4><a href="post.html">Who is who - example blog post</a></h4>
              <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a></p>
              <hr>
              <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
              <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a></p>
            </div>
          </div>
        </div>
        <!-- /#blog-homepage-->
      </div>
    </div>
    <!-- /.container-->
    <!-- *** BLOG HOMEPAGE END ***-->
  </div>
@endsection