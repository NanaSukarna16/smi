@extends('template_be.app')
@section('konten')    
    <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2 mt-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Detail Highlight
                <a href="{{ route('highlight')}}">
                    <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                       <i class="fas fa-left"></i> Kembali
                    </button>
                </a>
            </div>
            <div class="p-3">
                <form class="w-full" enctype="multipart/form-data" action="{{ route('highlight.store', $highlight['id'] ) }}" method="post">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-password">
                                Judul Higlight
                            </label>
                            <input type="text" value="{{ $highlight['judul']}}"  class="form-control {{ $errors->first('judul') ? "is-invalid":""}} appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"  name="judul" placeholder="masukan judul highlight"/>
                                @error('judul')
                                    <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror      
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-password">
                                Gambar 
                            </label>
                            @if ($highlight['img'])  
                            <img src="{{ asset('storage/highlight/'.$highlight['img'])}}" width="120px" alt="gambar">                       
                            @else
                                <span class="text-danger">Tidak Ada Gambar</span>
                            @endif
                            <input type="file" value="{{ old('img')}}"  class="form-control {{ $errors->first('img') ? "is-invalid":""}} appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="img"/>
                            <small class="text-danger">Kosongkan Jika Tidak Ingin Mengubah Gambar</small>     
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-password">
                                Deskripsi 
                            </label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" rows="10">{{$highlight['deskripsi']}}</textarea>
                                 @error('deskripsi')
                                    <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror  
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/Grid Form-->

@endsection