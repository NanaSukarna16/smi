<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public $new_testimonial;
    public function __construct()
    {
        $this->new_testimonial = new Testimonial();
    }

    public function index()
    {
        $batas = 8;
        // query tampil berdasarkan request nama;
       $data = Testimonial::orderBy('id', 'DESC')
        ->simplePaginate($batas);
        
        $no = $batas * ($data->currentPage() - 1);
        return view('testimonial.index', [
            'testimonial' => $data, 'no' => $no
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
         return view('testimonial.create');
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
            'testimonial' => "required",
            'profesi' => "required",
        ];
        $messages = [
            'required' => ":attribute tidak boleh kosong",
            'mimes' => ":attribute Ektensi error, gunakan .png , .jpg"
        ];
        $this->validate($request, $rules, $messages);
        $nm = $request->img;

        $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

        $this->new_testimonial->nama = $request->nama;
        $this->new_testimonial->testimonial = $request->testimonial;
        $this->new_testimonial->profesi = $request->profesi;
        $this->new_testimonial->img = $namaFile;
        $nm->move(public_path() . '/storage/testimonial', $namaFile);

        $this->new_testimonial->save();
        return redirect()->route('testimonial')->with('status', 'successfully created');
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
        // $pelatihan_edit = Pelatihan::find($id);
        $data  = Testimonial::find($id);
        return view('testimonial.edit', [
            'testimonial' => $data
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
        $testimonial_edit = Testimonial::find($id);
        $testimonial_edit->nama = $request->nama;
        $testimonial_edit->testimonial = $request->testimonial;
        $testimonial_edit->profesi = $request->profesi;
        $gambarLama = $testimonial_edit->img;

        if (!$request->img) {
            $testimonial_edit->img = $gambarLama;
        } else {
            if ($request->img != $gambarLama) {
                $nm = $request->img;

                $namaFile = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();

                $testimonial_edit->img = $namaFile;
                $nm->move(public_path() . '/storage/testimonial', $namaFile);
            } else {
                $request->img->move(public_path() . '/storage/testimonial', $gambarLama);
            }
        }
        $testimonial_edit->save();
        return redirect()->route('testimonial')->with('status', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial_hapus = Testimonial::findOrFail($id);
        $image_path = "storage/testimonial/" . $testimonial_hapus->img;

        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        $testimonial_hapus->delete();
        return redirect()->route('testimonial')->with('status', 'Successfully deleted');
    }
}
