<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use App\Models\Produk;
use App\Models\Visi;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class TentangController extends Controller
{
    public $new_tentang;
    public function __construct()
    {
        $this->new_tentang = new Tentang();
    }

    public function index()
    {
         // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Tentang::orderBy('id', 'ASC')->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('tentang.index', [
            'tentang' => $data, 'no' => $no
        ]);
    }
     public function index1($id)
    {
        $data = DB::select("SELECT * FROM visi WHERE tentang_id = $id");
        $data1 = DB::select("SELECT * FROM sejarah WHERE tentang_id = $id");
        $data5 = DB::select("SELECT * from organisasi where tentang_id = $id");
        $data8 = DB::select("SELECT * from profil_trainer where tentang_id = $id");
        $data2 = Produk::all();
        $data3 = Tentang::all();
        $data7  = Tentang::Where('id', $id)
            ->first();
        $data4  = Tentang::selectRaw("nama")
            ->Where('id', $id)
            ->get();
        // dd($data3);
        return view('halaman_tentang.index', [
            'visi' => $data, 'produk' => $data2, 'tentang' => $data3, 'namaTentang' => $data4, 
            'sejarah' => $data1, 'organisasi' => $data5, 'namaTentang2' => $data7, 'trainer' =>  $data8
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tentang.create'); 
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
        $this->new_tentang->nama = $request->nama;
        $this->new_tentang->save();
        return redirect()->route('tentang')->with('status', 'successfully created');
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
        $tentang_edit = Tentang::find($id);
        return view('tentang.edit', [
            'tentang' => $tentang_edit
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
        $tentang_edit = Tentang::find($id);
        $tentang_edit->nama = $request->nama;
        $tentang_edit->save();
        return redirect()->route('tentang')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tentang_hapus = Tentang::findOrFail($id);
        $tentang_hapus->delete();
        return redirect()->route('tentang')->with('status', 'successfully deleted');
    }
}
