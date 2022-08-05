<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use App\Models\Produk;
use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class HighlightController extends Controller
{
    public $new_highlight;
    public function __construct()
    {
        $this->new_highlight = new Highlight();
    }

    public function index()
    {
        $tangkap = request()->cari;
        // $batas1 = $request->page;
        $batas = 8;
        // query tampil berdasarkan request nama;
        $data = Highlight::where('judul', 'LIKE', "%$tangkap%")
        ->orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('highlight.index', [
            'highlight' => $data, 'no' => $no
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
        $data4 = Highlight::orderBy('id', 'DESC')->simplePaginate($batas);
        return view('halaman_highlight.index', [
            'highlight' => $data4, 'produk' => $data, 'tentang' => $data2
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('highlight.create');
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
            'judul' => "required",
            'deskripsi' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg"
        ];

        $this->validate($request, $rules, $messages);
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_highlight->judul = $request->judul;
        $this->new_highlight->deskripsi = $request->deskripsi;
        $this->new_highlight->img = $namaFile;
        $nm->move(public_path() . '/storage/highlight', $namaFile);

        $this->new_highlight->save();
        return redirect()->route('highlight')->with('status', 'successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $highlight_detail = Highlight::find($id);
          $data = Produk::all();
        // $data1 = Visi::all();
        $data2 = Tentang::all();
        $highlight_lainnya = Highlight::where('id', 'not like', $highlight_detail->id)
            ->limit(8)
            ->orderBy('id', 'DESC')
            ->get();

        // dd($berita_lainnya)
        return view('halaman_highlight.show', [
            'highlight_detail' => $highlight_detail, 'highlight_lainnya' => $highlight_lainnya,
            'produk' => $data, 'tentang' => $data2
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
        // $pelatihan_edit = Pelatihan::find($id);
        $data  = Highlight::find($id);
        return view('highlight.edit', [
            'highlight' => $data
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
        $highlight_edit = Highlight::find($id);
        $highlight_edit->judul = $request->judul;
        $highlight_edit->deskripsi = $request->deskripsi;
        $gambarLama = $highlight_edit->img;

        if (!$request->img) {
            $highlight_edit->img = $gambarLama;
        } else {

            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $highlight_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/highlight', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/highlight', $gambarLama);
            }
        }
        $highlight_edit->save();
        return redirect()->route('highlight')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $highlight_hapus = Highlight::findOrFail($id);
        $image_path = "storage/highlight/" . $highlight_hapus->img;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $highlight_hapus->delete();
        return redirect()->route('highlight')->with('status', 'Successfully deleted');
    }
}
