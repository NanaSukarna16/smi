@extends('template_fe.app')
@section('konten')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Produk</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('web') }}">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2a7eec">Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Produk</h4>
                @foreach ($namaProduk as $item)
                    <h1 class="display-5 mb-4">{{ $item->nama}}</h1>
                @endforeach
                
            </div>
            <div class="row g-4">
                 @foreach ($jenis as $item)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex position-relative text-center h-100">
                        <div class="service-text p-5">
                            <img class="mb-4" src="{{asset('storage/pelatihan/'.$item->img)}}" width="50%" alt="Icon">
                            <h4 class="mb-3">{{ $item->nama }}</h4>
                            {{-- <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p> --}}
                            <a class="btn" href="{{ route('pelatihan.show', $item->id )}}"><i class="fa fa-plus me-3" style="color: #2a7eec;"></i>Detail</a>
                        </div>
                    </div>
                </div>
                  @endforeach
            </div>  
        </div>
    </div>
    <!-- Service End -->
@endsection