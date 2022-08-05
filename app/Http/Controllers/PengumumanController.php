<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Produk;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public $new_penguuman;
    public function __construct()
    {
        $this->new_pengumuman = new Pengumuman();
    }

    public function index()
    {
    
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Pengumuman::orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('pengumuman.index', [
            'pengumuman' => $data, 'no' => $no
        ]);
    }
    public function index1()
    {
        // buat paginition
        $batas = 9;
        $data = Produk::all();
        // $data1 = Visi::all();
        $data2 = Tentang::all();
        // $data3 = Sejarah::all();
        $data4 = Pengumuman::orderBy('id', 'DESC')->simplePaginate($batas);
        return view('halaman_pengumuman.index', [
            'pengumuman' => $data4, 'produk' => $data, 'tentang' => $data2
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengumuman.create');
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
            'img' => "required|mimes:png,jpg,jpeg",
            'file' => "required|mimes:pdf",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg, .pdf"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->img;
        $nm2 = $request->file;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $namaFile2 = time() . rand(100, 999) . "." . $nm2->getClientOriginalExtension();

        $this->new_pengumuman->img = $namaFile;
        $this->new_pengumuman->file = $namaFile2;
        $nm->move(public_path() . '/storage/pengumuman', $namaFile);
        $nm2->move(public_path() . '/storage/pengumuman', $namaFile2);

        $this->new_pengumuman->save();
        return redirect()->route('pengumuman')->with('status', 'successfully created');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
