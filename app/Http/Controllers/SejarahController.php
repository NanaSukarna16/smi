<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use App\Models\Produk;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SejarahController extends Controller
{
    public $new_sejarah;
    public function __construct()
    {
        $this->new_sejarah = new Sejarah();
    }

    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
       $data = Sejarah::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('sejarah.index', [
            'sejarah' => $data, 'no' => $no
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
        return view('sejarah.create', [
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
            'sejarah' => "required",
            'tentang_id' => "required",   
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong"
        ];

        $this->validate($request, $rules, $messages);  
        $this->new_sejarah->sejarah = $request->sejarah;
        $this->new_sejarah->tentang_id = $request->tentang_id;
        $this->new_sejarah->save();
        return redirect()->route('sejarah')->with('status', 'successfully created');
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
        $sejarah_edit = Sejarah::find($id);

        return view('sejarah.edit', [
            'tentang' => $data, 'sejarah' => $sejarah_edit
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
        $sejarah_edit = Sejarah::find($id);
        $sejarah_edit->sejarah = $request->sejarah;
        $sejarah_edit->tentang_id = $request->tentang_id;
        $sejarah_edit->save();
        return redirect()->route('sejarah')->with('status', 'successfully updated');
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
