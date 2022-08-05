@extends('template_fe.app')
@section('konten')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Pengumuman</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('web') }}">Beranda</a></li>
                    {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2a7eec">pengumuman</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


     <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Pengumuman</h4>
                <h4 class="display-5 mb-4">SEBI Management Institute</h4>
            </div>
            <div class="row g-4">
                @foreach ($pengumuman as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="http://localhost:8000/storage/pengumuman/{{ $item->file }}" target = "_ blank">
                            <img src="{{asset('storage/pengumuman/'.$item->img)}}" alt="Icon" width="100%">
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- <div class="text-center mx-auto mb-5 wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                @foreach ($produk_lainnya as $item)
                <a href="{{ route('pelatihan.index1', $item->id)}}" class="btn btn-primary py-3 px-5 animated slideInLeft">Lihat Lainnya</a>
                @endforeach
            </div> --}}
        </div>
    </div>
    <!-- Facts End -->

    <!-- Service Start -->
    {{-- <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Berita dan Liputan</h4>    
                <h1 class="display-5 mb-4">SEBI Management Institute</h1>  
            </div>
             <div class="row">
            @foreach ($highlight as $item)        
            <div class="col-md-6 col-lg-4 col-xl-4">             
                    <div class="card mt-3">
                        <a href="{{ route('highlight.show', $item->id )}}">
                            <img style="max-height: 180px;" src="{{asset('storage/highlight/'.$item->img)}}" class="card-img-top" alt="...">
                        </a>
                      <div class="card-body">
                        <h4 class="card-title"> <a href="{{ route('highlight.show', $item->id )}}"><strong style="color: #2a7eec">{{ $item->judul}}</strong> </a> </h4>
                        <p class="card-text">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</p>
                      </div>
                    </div>        
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    {{ $highlight->links() }}
                </div>
            </div>
        </div>
        </div>
    </div> --}}
    <!-- Service End -->
       
@endsection