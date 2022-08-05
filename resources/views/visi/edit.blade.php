@extends('template_be.app')
@section('konten')
        
     <!--Grid Form-->
    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2 mt-2">
        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
            <div class="bg-gray-200 px-2 py-3 border-solid border-gray-200 border-b">
                Edit Visi dan Misi
                <a href="{{ route('visi')}}">
                    <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                       <i class="fas fa-left"></i> Kembali
                    </button>
                </a>
            </div>
            <div class="p-3">
                <form class="w-full" enctype="multipart/form-data" action="{{ route('visi.update', $visi['id']) }}" method="post">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-password">
                                Visi 
                            </label>
                            {{-- <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                   id="grid-password" type="text" placeholder="masukan nama produk"> --}}
                            <input type="text" value="{{ $visi['visi'] }}"  class="form-control {{ $errors->first('visi') ? "is-invalid":""}} appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"  name="visi" placeholder="masukan visi"/>
                                @error('visi')
                                    <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror      
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-password">
                                Misi 
                            </label>
                            {{-- <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                   id="grid-password" type="text" placeholder="masukan nama produk"> --}}
                            <input type="text" value="{{ $visi['misi']}}"  class="form-control {{ $errors->first('misi') ? "is-invalid":""}} appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"  name="misi" placeholder="masukan misi"/>
                                @error('misi')
                                    <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror      
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                   for="grid-password">
                                Jenis Tentang Kami
                            </label>
                            {{-- <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                   id="grid-password" type="text" placeholder="masukan nama produk"> --}}
                            <select class="form-control {{ $errors->first('tentang_id') ? "is-invalid":""}} appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey" name="tentang_id">
                                <option value="" selected disabled>Pilih Jenis Tentang Kami</option>
                                @foreach ($tentang as $item)
                                <option value="{{ $item->id }}" {{$item->id == $visi['tentang_id'] ? 'selected' : ''}}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                             @error('tentang_id')
                                    <div class="bg-red-300 border-l-4 mb-2 border-orange-500 text-orange-800 p-4 mt-2" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror    
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--/Grid Form-->

@endsection