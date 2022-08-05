@extends('template_fe.app')
@section('konten')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h5 class="display-1 text-white animated slideInDown" style="font-size: 40px">{{ $produk_detail->nama }}</h5>   
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('web') }}">Beranda</a></li>
                    {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2a7eec">Produk</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

      <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                 <div class="col-lg-8 wow fadeIn" data-wow-delay="0.5s">
                    <h4 class="section-title">Deskripsi</h4>
                    <p style="text-align: justify">
                        {{ $produk_detail->deskripsi}}
                    </p>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                   <div class="card">
                        <div style="background-color: #2a7eec";>  
                            <h2 class="card-title mt-3 text-white" style="padding-left: 20px"><strong> Produk Lainnya</strong></h2>
                        </div> 
                        <div class="card-body">
                            @foreach ($produk_lainnya as $item)                      
                            <div class="media pt-3">
                                <a href="{{ route('pelatihan.show', $item->id )}}">
                                    <img style="max-width: 150px;" class="mr-3" alt="Bootstrap Media Preview" src="{{asset('storage/pelatihan/'.$item->img)}}" />
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-2" style="color: #2a7eec">
                                        <a href="{{ route('pelatihan.show', $item->id )}}" style="color: #2a7eec">
                                            {{ $item->nama}}
                                        </a>
                                    </h5>
                                </div>
                            </div>                      
                            @endforeach
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection