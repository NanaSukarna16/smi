<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\Produk;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class PelatihanController extends Controller
{
    public $new_pelatihan;
    public function __construct()
    {
        $this->new_pelatihan = new Pelatihan();
    }

    public function index()
    {
         // Tangkap request nama
        $tangkap = request()->cari;
        // $batas1 = $request->page;
        $batas = 8;
        // query tampil berdasarkan request nama;
       $data = Pelatihan::where('nama', 'LIKE', "%$tangkap%")
        ->with('produk')
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('pelatihan.index', [
            'pelatihan' => $data, 'no' => $no
        ]);
    }

    public function index1($id)
    {
        $data = DB::select("SELECT * FROM pelatihan WHERE produk_id = $id");
        $data2 = Produk::all();
        $data3 = Tentang::all();
        $data4  = produk::selectRaw("nama")
            ->Where('id', $id)
            ->get();
        // dd($data3);
        return view('halaman_produk.index', [
            'jenis' => $data, 'produk' => $data2, 'namaProduk' => $data4, 'tentang' => $data3, 
        ]);
    }
    public function create()
    {
        $data = Produk::all();
        return view('pelatihan.create', [
            'produk' => $data,
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
            'produk_id' => "required",
            'deskripsi' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_pelatihan->nama = $request->nama;
        $this->new_pelatihan->produk_id = $request->produk_id;
        $this->new_pelatihan->deskripsi = $request->deskripsi;
        $this->new_pelatihan->img = $namaFile;
        $nm->move(public_path() . '/storage/pelatihan', $namaFile);

        $this->new_pelatihan->save();
        return redirect()->route('pelatihan')->with('status', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data  = pelatihan::selectRaw("nama")
            ->Where('id', $id)
            ->get();
        $data2 = Produk::all();
        $data3 = Tentang::all();
        $produk_detail = Pelatihan::find($id);
        // $cek = $produk_detail->produk_id;
        // dd($cek);
        $produk_lainnya = Pelatihan::where('produk_id', 'like', $produk_detail->produk_id)
            ->Where('id', 'not like' , $produk_detail->id)
            ->limit(3)
            ->orderBy('id', 'DESC')
            ->get();

        // dd($berita_lainnya)
        return view('halaman_produk.show', [
            'produk_detail' => $produk_detail, 'produk_lainnya' => $produk_lainnya, 'produk' => $data2, 'tentang' => $data3
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data  = Produk::all();
        $pelatihan_edit = Pelatihan::find($id);

        return view('pelatihan.edit', [
            'produk' => $data, 'pelatihan' => $pelatihan_edit
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
        $pelatihan_edit = Pelatihan::find($id);
        $pelatihan_edit->nama = $request->nama;
        $pelatihan_edit->produk_id = $request->produk_id;
        $pelatihan_edit->deskripsi = $request->deskripsi;
        $gambarLama = $pelatihan_edit->img;

        if (!$request->img) {
            $pelatihan_edit->img = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $pelatihan_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/pelatihan', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/pelatihan', $gambarLama);
            }
        }
        $pelatihan_edit->save();
        return redirect()->route('pelatihan')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelatihan_hapus = Pelatihan::findOrFail($id);
        $image_path = "storage/pelatihan/" . $pelatihan_hapus->img;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $pelatihan_hapus->delete();
        return redirect()->route('pelatihan')->with('status', 'Successfully deleted');
    }
}
