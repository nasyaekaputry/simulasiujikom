<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Kategoribukurelasi;
use Illuminate\Http\Request;
class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategoribukurelasi::all();
        return view('buku', compact('buku','kategori'));
    }

    public function create()
    {
        $kategori = Kategori::distinct()->get();
        return view('buku_create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'foto' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required|integer',
            'kategori_id' => 'required',
        ]);
        $fotoPath = $request->file('foto')->store('buku_images', 'public');
        //cari kategori berdasarkan ID
        $kategori = Kategori::find($request->kategori_id);
        //tambah buku baru beserta kategori
        $buku = Buku::create([
            'foto' => $fotoPath,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);
        //plot kategori ke data buku yang ditambahkan
        $buku->kategori()->attach($kategori);
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }
    public function edit($id){
        $buku = Buku::findOrFail($id);
        return view ('buku_edit', ['buku'=>$buku]);

    }
    public function update(Request $request, $id){
        $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'penerbit'=>'required',
            'tahun_terbit'=>'required',
        ]);
        Buku::find($id)->update([
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'penerbit'=>$request->penerbit,
            'tahun_terbit'=>$request->tahun_terbit,
        ]);
        return redirect('/buku');
    }
    public function destroy($id){
        // Kategori::find($id)->destroy();
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');

    }
        public function welcome(){
        $buku = Buku::all();
        return view ('welcome', ['buku'=>$buku]);
        
    }
    

    
      
}

