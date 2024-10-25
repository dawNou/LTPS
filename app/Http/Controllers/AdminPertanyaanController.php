<?php

namespace App\Http\Controllers;

use App\Models\Katprod;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pertanyaans.index', [
            'pertanyaans' => Pertanyaan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pertanyaans.create', [
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
            'soal' => 'required|max:200',
            'slug' => 'required|unique:pertanyaans',
            'katprod_id' => 'required'
        ]);

        // $validatedData['user_id'] = auth()->user()->user_id;
        $validatedData['user_id'] = auth()->user()->id;

        Pertanyaan::create($validatedData);

        return redirect('/dashboard/pertanyaans')->with('success', 'Pertanyaan Baru Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pertanyaan $pertanyaan)
    {
        return view('dashboard.pertanyaans.edit', [
            'pertanyaan' => $pertanyaan,
            'katprods' => Katprod::all()
            // 'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pertanyaan $pertanyaan)
    {
        $rules = [
            'soal' => 'required|max:200',
            'katprod_id' => 'required|exists:katprods,katprod_id',
        ];

        if($request->slug != $pertanyaan->slug) {
            $rules['slug'] = 'required|unique:pertanyaans';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['user_id'] = auth()->user()->id;

        Pertanyaan::where('pertanyaan_id', $pertanyaan->pertanyaan_id)
            ->update($validatedData);

        return redirect('/dashboard/pertanyaans')->with('success', 'Pertanyaan Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pertanyaan  $pertanyaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pertanyaan $pertanyaan)
    {
        Pertanyaan::destroy($pertanyaan->pertanyaan_id);

        return redirect('/dashboard/pertanyaans')->with('success', 'Pertanyaan Telah Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Pertanyaan::class, 'slug', $request->soal);
        return response()->json(['slug' => $slug]);
    }
}
