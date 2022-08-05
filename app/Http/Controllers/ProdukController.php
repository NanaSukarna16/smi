<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Tentang;
use App\Models\Visi;
use App\Models\Sejarah;
use App\Models\Pelatihan;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public $new_produk;
    public function __construct()
    {
        $this->new_produk = new Produk();
    }

    public function index()
    {
         // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Produk::where('nama', 'LIKE', "%$tangkap%")->orderBy('id', 'DESC')->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('produk.index', [
            'produk' => $data, 'no' => $no
        ]);
    }

    public function index1()
    {
        $data = Produk::all();
        $data1 = Visi::all();
        $data2 = Tentang::all();
        $data3 = Sejarah::all();
        $data4 = Pelatihan::where('produk_id', 1)->limit('3')->get();
        $data5 = Produk::where('id', 1)->get();
        $data6 = Testimonial::all();
        return view('halaman_beranda.index', [
            'produk' => $data, 'tentang' => $data2, 'misi' => $data1, 'sejarah' => $data3, 'pelatihan' => $data4,
             'produk_lainnya' => $data5, 'testimonial' => $data6 
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = [
            'nama' => "required",    
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);  
        $this->new_produk->nama = $request->nama;
        $this->new_produk->save();
        return redirect()->route('produk')->with('status', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk_edit = Produk::find($id);
        return view('produk.edit', [
            'produk' => $produk_edit
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk_edit = Produk::find($id);
        $produk_edit->nama = $request->nama;
        $produk_edit->save();
        return redirect()->route('produk')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk_hapus = Produk::findOrFail($id);
        $produk_hapus->delete();
        return redirect()->route('produk')->with('status', 'successfully deleted');
    }
}
