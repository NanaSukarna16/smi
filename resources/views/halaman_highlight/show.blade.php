@extends('template_fe.app')

@section('konten')    

<div class="container-fluid">
	<div class="row mt-5 ml-2 mr-2">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-8">
                    <h1 style="font-size: 40px"> <strong>{{ $highlight_detail->judul}}</strong></h1> <br>
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($highlight_detail->created_at)->translatedFormat(' d F Y') }}</li>
                        <li class="list-inline-item"><i class="fa fa-clock"></i> {{ \Carbon\Carbon::parse($highlight_detail->created_at)->translatedFormat('h:i:s A') }}</li>
                        <li class="list-inline-item"><i class="fa fa-user"></i> Administrator</li>
                    </ul>
                    <hr>
					<img alt="Bootstrap Image Preview" width="800px" src="{{asset('storage/highlight/'.$highlight_detail->img)}}"/>
					<div class="mt-3 mb-3">
						<p class="text-justify">
							<b>{{$highlight_detail->deskripsi}}</b>
						</p>
					</div>
				</div>
				<div class="col-md-4  col-lg-4 col-xl-4">
                    <div class="card">
                        <div style="background-color: #2a7eec">  
                            <h2 class="card-title ml-3 mt-3 text-white"><strong>Berita Lainnya</strong></h2>
                        </div> 
                        <div class="card-body">
                            @foreach ($highlight_lainnya as $item)                      
                            <div class="media pt-3">
                                <a href="{{ route('highlight.show', $item->id )}}">
                                    <img style="max-width: 100px;" class="mr-3" alt="Bootstrap Media Preview" src="{{asset('storage/highlight/'.$item->img)}}" />
                                </a>
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        <a href="{{ route('highlight.show', $item->id )}}" style="color: #2a7eec">
                                            {{ $item->judul}}
                                        </a>
                                    </h5>
                                    <span class="badge bg-secondary text-white">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat(' d F Y') }}</span>
                                    <span class="badge bg-danger text-white"> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('h:i:s') }}</span>
                                </div>
                            </div>                      
                            @endforeach
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
