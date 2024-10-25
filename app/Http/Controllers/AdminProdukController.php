<?php

namespace App\Http\Controllers;

use App\Models\Katprod;
use App\Models\Produk;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produks.index', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produks.create', [
            'katprods' => Katprod::all()
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
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:100',
            'slug' => 'required|unique:produks',
            'katprod_id' => 'required',
            'image' => 'required|image|file|max:1024',
            'body' => 'required',
            'harga_produk' => 'required|integer|min:0' // Validasi untuk harga
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // $validatedData['user_id'] = auth()->user()->user_id;
        $validatedData['user_id'] = auth()->user()->id;

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Produk::create($validatedData);

        return redirect('/dashboard/produks')->with('success', 'Produk Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('dashboard.produks.show', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produks.edit', [
            'produk' => $produk,
            'katprods' => Katprod::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $rules = [
            'nama_produk' => 'required|max:100',
            'katprod_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
            'harga_produk' => 'required|integer|min:0' // Validasi untuk harga
        ];

        if($request->slug != $produk->slug) {
            $rules['slug'] = 'required|unique:produks';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Produk::where('produk_id', $produk->produk_id)
            ->update($validatedData);

        return redirect('/dashboard/produks')->with('success', 'Produk Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::delete($produk->image);
        }
        
        Produk::destroy($produk->produk_id);

        return redirect('/dashboard/produks')->with('success', 'Produk Telah Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Produk::class, 'slug', $request->nama_produk);
        return response()->json(['slug' => $slug]);
    }
}
