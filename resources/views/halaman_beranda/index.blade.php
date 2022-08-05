@extends('template_fe.app')
@section('konten')  
    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{ asset('template_fe') }}/img/carousel-1.jpg'>">
                <img class="img-fluid" src="{{ asset('template_fe') }}/img/carousel-1.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">SEBI Management Institute</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3"><b>Visi dan Misi</b></p>
                                @foreach ($misi as $item)
                                    @php
                                        $isi = $item->visi;
                                        $potong_isi = substr($isi, 0, 30). "......";
                                    @endphp
                                <p class="fs-5 fw-medium text-white mb-4 pb-3" style="margin-top: -20px">
                                    {{$potong_isi}}
                                </p>
                                <a href="{{ route('tentang.index1', $item->tentang_id)}}" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative" data-dot="<img src='{{ asset('template_fe') }}/img/carousel-2.jpg'>">
                <img class="img-fluid" src="{{ asset('template_fe') }}/img/carousel-2.jpg" alt="">
                <div class="owl-carousel-inner">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="display-1 text-white animated slideInDown">SEBI Management Institute</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-3"><b>Sejarah Singkat</b></p>
                                 @foreach ($sejarah as $item)
                                    @php
                                        $isi = $item->sejarah;
                                        $potong_isi = substr($isi, 0, 30). "......";
                                    @endphp
                                <p class="fs-5 fw-medium text-white mb-4 pb-3" style="margin-top: -20px">
                                    {{$potong_isi}}
                                </p>
                                <a href="{{ route('tentang.index1', $item->tentang_id)}}" class="btn btn-primary py-3 px-5 animated slideInLeft">Read More</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Facts Start -->
    <div class="container-xxl py-5">
        <div class="container pt-5">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">PENDIDIKAN DAN PELATIHAN</h4>
                <h4 class="display-5 mb-4">SEBI Management Institute</h4>
            </div>
            <div class="row g-4">
                @foreach ($pelatihan as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('pelatihan.show', $item->id )}}">
                            <img src="{{asset('storage/pelatihan/'.$item->img)}}" alt="Icon" width="100%">
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp mt-3" data-wow-delay="0.1s" style="max-width: 600px;">
                @foreach ($produk_lainnya as $item)
                <a href="{{ route('pelatihan.index1', $item->id)}}" class="btn btn-primary py-3 px-5 animated slideInLeft">Lihat Lainnya</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h4 class="section-title">Testimonial</h4>
                <h1 class="display-5 mb-4">SEBI Management Institute</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($testimonial as $item)
                <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src='{{asset('storage/testimonial/'.$item->img)}}' alt=''>">
                    <p class="fs-5">"{{ $item->testimonial }}"</p>
                    <h3>{{ $item->nama }}</h3>
                    <span style="color: #2a7eec;">{{ $item->profesi }}</span>
                </div>
                @endforeach
            </div>      
        </div>
    </div>
    <!-- Testimonial End -->

@endsection