@extends('template_fe.app')
@section('konten')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Berita</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('web') }}">Beranda</a></li>
                    {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2a7eec">berita</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

     <!-- Service Start -->
    <div class="container-xxl py-5">
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
    </div>
    <!-- Service End -->
       
@endsection