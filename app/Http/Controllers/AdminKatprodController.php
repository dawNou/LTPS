<?php

namespace App\Http\Controllers;

use App\Models\Katprod;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminKatprodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.katprods.index', [
            'katprods' => Katprod::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.katprods.create');
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
            'namakatprod' => 'required|max:50',
            'slug' => 'required|unique:katprods'
        ]);

        // $validatedData['user_id'] = auth()->user()->user_id;
        $validatedData['user_id'] = auth()->user()->id;

        Katprod::create($validatedData);

        return redirect('/dashboard/katprods')->with('success', 'Kategori Produk Baru Telah Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Katprod  $katprod
     * @return \Illuminate\Http\Response
     */
    public function show(Katprod $katprod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Katprod  $katprod
     * @return \Illuminate\Http\Response
     */
    public function edit(Katprod $katprod)
    {
        return view('dashboard.katprods.edit', [
            'katprod' => $katprod
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Katprod  $katprod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Katprod $katprod)
    {
        $rules = [
            'namakatprod' => 'required|max:50'
        ];

        if ($request->slug != $katprod->slug) {
            $rules['slug'] = 'required|unique:katprods';
        }

        $validatedData = $request->validate($rules);

        // Katprod::where('katpord_id',$katprod->katprod_id)
        //     ->update($validatedData);

        $katprod->update($validatedData);

        return redirect('/dashboard/katprods')->with('success', 'Kategori Produk Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Katprod  $katprod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Katprod $katprod)
    {
        Katprod::destroy($katprod->katprod_id);

        return redirect('/dashboard/katprods')->with('success', 'Kategori Produk Telah Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Katprod::class, 'slug', $request->namakatprod);
        return response()->json(['slug' => $slug]);
    }
}
