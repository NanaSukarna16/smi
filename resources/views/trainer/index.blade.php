@extends('template_be.app')
@section('konten')  

    <!-- Card Sextion Starts Here -->
        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2 mt-2">
            <!-- card -->
            <div class="rounded overflow-hidden shadow bg-white mx-2 w-full">
                <div class="px-6 py-2 border-b border-light-grey">
                    @if (session('status'))
                        <div class="bg-green-300 mb-2 border border-green-300 text-green-600 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('status') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-green" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    @endif
                    <div class="font-bold text-xl">
                        Profil Trainer 
                    </div>
                        <a href="{{ route('trainer.create')}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-plus"></i> Trainer Baru
                            </button>
                        </a>
                </div>
                <div class="table-responsive">
                    <table class="table text-grey-darkest">
                        <thead class="bg-grey-dark text-white text-normal">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                             @forelse ($trainer as $item)   
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$item->nama}}</td>
                                <td>
                                    <a href="#" class="pop">
                                        <img src="{{asset('storage/trainer/'.$item->img)}}" alt="image" width="70px"/>
                                    </a> 
                                </td>
                                <td>
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="{{route('trainer.edit', $item->id)}}">
                                            <i class="fas fa-edit"></i></a>
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500" href="{{route('trainer.destroy', $item->id)}}" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')">
                                            <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>  
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center text-danger" colspan="6"><b>TIDAK ADA DATA</b></td>
                            </tr>     
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /card -->
            {{-- awal pop up gambar --}}
     <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">							   
          <div class="modal-content">         						      
           <div class="modal-body">
                                                 
             <button type="button" class="close" data-dismiss="modal"><span 
             aria-hidden="true">&times;</span><span class="sr- 
             only">Close</span></button>						        
            <img src="" class="imagepreview" style="width: 100%;">
                                            
           </div>							    
         </div>								   
        </div>
    </div>
    {{-- awal pop up gambar --}}
        </div>
    <!-- /Cards Section Ends Here -->
@endsection

@push('js-popup')
<script>
$('.myImg').on('click',()=>{
	
	if(event.target.attributes.src.nodeValue)
	{
		$('#myModal').modal('show');
		$('#imgMe').attr('src', event.target.attributes.src.nodeValue);
		$('.modal-backdrop').hide();
	}
});


</script>
@endpush

