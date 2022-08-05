<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Models\Produk;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class TrainerController extends Controller
{
    public $new_trainer;
    public function __construct()
    {
        $this->new_trainer = new Trainer();
    }

    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
       $data = Trainer::with('tentang')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('trainer.index', [
            'trainer' => $data, 'no' => $no
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
        return view('trainer.create', [
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
            'img' => "required|mimes:png,jpg,jpeg",
            'nama' => "required",
            'tentang_id' => "required",
            'deskripsi' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_trainer->nama = $request->nama;
        $this->new_trainer->tentang_id = $request->tentang_id;
        $this->new_trainer->deskripsi = $request->deskripsi;
        $this->new_trainer->img = $namaFile;
        $nm->move(public_path() . '/storage/trainer', $namaFile);

        $this->new_trainer->save();
        return redirect()->route('trainer')->with('status', 'successfully created');
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
        $trainer_edit = Trainer::find($id);

        return view('trainer.edit', [
            'tentang' => $data, 'trainer' => $trainer_edit
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
        $organisasi_edit = Trainer::find($id);
        $trainer_edit->nama = $request->nama;
        $trainer_edit->tentang_id = $request->tentang_id;
        $trainer_edit->deskripsi = $request->deskripsi;
        $gambarLama = $trainer_edit_edit->img;

        if (!$request->img) {
            $trainer_edit->img = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $trainer_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/trainer', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/trainer', $gambarLama);
            }
        }
        $trainer_edit->save();
        return redirect()->route('trainer')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer_hapus = Trainer::findOrFail($id);
        $image_path = "storage/trainer/" . $trainer_hapus->img;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $trainer_hapus->delete();
        return redirect()->route('trainer')->with('status', 'Successfully deleted');
    }
}
