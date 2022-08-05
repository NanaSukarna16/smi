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
                        Sejarah Singkat
                    </div>
                        <a href="{{ route('sejarah.create')}}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-plus"></i> Sejarah Baru
                            </button>
                        </a>
                </div>
                <div class="table-responsive">
                    <table class="table text-grey-darkest">
                        <thead class="bg-grey-dark text-white text-normal">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Sejarah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                             @forelse ($sejarah as $item)   
                            <tr>
                                <td>{{++$no}}</td>
                                <td>{{$item->sejarah}}</td>
                                <td>
                                    <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white" href="{{route('sejarah.edit', $item->id)}}">
                                            <i class="fas fa-edit"></i></a>
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
        </div>
    <!-- /Cards Section Ends Here -->
@endsection
