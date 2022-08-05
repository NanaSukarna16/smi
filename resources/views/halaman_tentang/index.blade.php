@extends('template_fe.app')
@section('konten')
     <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-1 text-white animated slideInDown">Tentang Kami</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('web') }}">Beranda</a></li>
                    @foreach ($namaTentang as $item)
                        <li class="breadcrumb-item active" aria-current="page"  style="color: #2a7eec;">{{$item->nama}}</li>  
                    @endforeach 
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                @foreach ($visi as $item)
                    <h4 class="section-title">Visi</h4>
                    <p>{{ $item->visi}}</p>
                    <h4 class="section-title" style="margin-top: 50px;">Misi</h4>
                    @php
                       $teksnya = $item->misi;
                       $teks = explode('.', $teksnya);
                    @endphp
                    <p>
                        @foreach ($teks as $key => $data)
                           <li>{{ $data }}</li> 
                        @endforeach
                    </p>

                @endforeach

                @foreach ($sejarah as $item)
                    <h4 class="section-title">Sejarah</h4>
                    <p>{{ $item->sejarah}}</p>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->

    @if ($namaTentang2->nama === "Organisasi")
   
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container" style="margin-top: -120px">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Struktur organisasi</h4>
                <h1 class="display-5 mb-4">sebi management institute</h1>
            </div>
            <div class="row g-0 team-items">
                @foreach ($organisasi as $item)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item position-relative">
                        <div class="position-relative">
                            <img class="img-fluid" src="{{asset('storage/organisasi/'.$item->img)}}">
                            {{-- <div class="team-social text-center">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                            </div> --}}
                        </div>
                        <div class="bg-light text-center p-4">
                            <h3 class="mt-2">{{ $item->nama }}</h3>
                            <span style="color: #2a7eec">{{ $item->jabatan}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
    <!-- Team End --> 
    
    @elseif($namaTentang2->nama === "Profil Trainer")

     <!-- Project Start -->
    <div class="container-xxl project py-5">
        <div class="container" style="margin-top: -200px">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Profil Trainer</h4>
                <h1 class="display-5 mb-4">Sebi management institute</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-12">
                    <div class="tab-content w-100">
                        @foreach ($trainer as $item)
                        <div class="tab-pane fade show active mb-3" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-2">
                                    <div class="position-relative h-100">
                                        <img class="img-fluid w-100 h-100" src="{{asset('storage/trainer/'.$item->img)}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <h3 class="mb-3">{{ $item->nama}}</h3>
                                    <p class="mb-4">{{ $item->deskripsi}}</p>
                                </div>
                            </div>                                 
                            
                        </div>
                        @endforeach
                        {{-- <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="img/project-3.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="img/project-4.jpg"
                                            style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Project End -->

    @endif
@endsection