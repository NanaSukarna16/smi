<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use App\Models\Produk;
use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class VisiController extends Controller
{
    public $new_visi;
    public function __construct()
    {
        $this->new_visi = new Visi();
    }

    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
       $data = Visi::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('visi.index', [
            'visi' => $data, 'no' => $no
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Tentang::all();
        return view('visi.create', [
            'tentang' => $data,
        ]);
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
            'visi' => "required",
            'misi' => "required", 
            'tentang_id' => "required",   
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);  
        $this->new_visi->visi = $request->visi;
        $this->new_visi->misi = $request->misi;
        $this->new_visi->tentang_id = $request->tentang_id;
        $this->new_visi->save();
        return redirect()->route('visi')->with('status', 'successfully created');
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
        $data  = Tentang::all();
        $visi_edit = Visi::find($id);

        return view('visi.edit', [
            'tentang' => $data, 'visi' => $visi_edit
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
        $visi_edit = Visi::find($id);
        $visi_edit->visi = $request->visi;
        $visi_edit->tentang_id = $request->tentang_id;
        $visi_edit->misi = $request->misi;
        $visi_edit->save();
        return redirect()->route('visi')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visi_hapus = Visi::findOrFail($id);
        $visi_hapus->delete();
        return redirect()->route('visi')->with('status', 'successfully deleted');
    }
}
