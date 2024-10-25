<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // defaultnya ini
        $categories = Category::with('keywords')->get();
        return view('dashboard.categories.index', compact('categories'));
        // sampe sini yang default
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // method create untuk nampilin view-nya
    public function create()
    {
        // Ambil filters dari session
        $filters = session('keyword_filters', []);

        // Ambil dan urutkan semua kata kunci
        $allKeywords = Keyword::orderBy('keyword')->get();

        // Ambil kata kunci yang sesuai dengan filter
        $keywords = empty($filters)
            ? Keyword::all()
            : Keyword::whereIn('keyword', $filters)->get();

        return view('dashboard.categories.create', [
            'keywords' => $keywords
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // method store untuk proses datanya

    // dari gupta
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories'
        ]);

        $category = Category::create($validatedData);

        if ($request->has('matched_keywords')) {
            // Dapatkan keyword yang valid dari database
            $keywordIds = Keyword::whereIn('keyword_id', $request->input('matched_keywords'))->pluck('keyword_id');
            $category->keywords()->attach($keywordIds);
        }

        return redirect('/dashboard/categories')->with('success', 'Kategori baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // method edit untuk nampilin view-nya
    public function edit(Category $category)
    {
        $keywords = Keyword::all();
        return view('dashboard.categories.edit', compact('category', 'keywords'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    // method update untuk prosesnya method edit
    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|max:50'
        ];

        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        // $validatedData['user_id'] = auth()->user()->user_id;
        $validatedData['user_id'] = auth()->user()->id;

        $category->update($validatedData);

        $category->keywords()->sync($request->input('keywords', []));

        return redirect('/dashboard/categories')->with('success', 'Kategori Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->category_id);

        return redirect('/dashboard/categories')->with('success', 'Kategori Telah Dihapus!');
    }

    // ini method buat fetch API-nya
    // method untuk menangani apabila ada permintaan slug
    // bikin slug, ngambil dari kelas category, terus ngambil fieldnya slug, terus ngambil dari namenya, terus return dalam bentuk json, yang berisi array asosiatif, yang key nya slug, isinya slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    // dari gupta #5
    public function checkKeywords(Request $request)
    {
        $name = $request->query('name');
        $keywords = Keyword::all(); // Ambil semua kata kunci dari database

        $matchedKeywords = [];
        $nameWords = explode(' ', strtolower($name)); // Pecah input menjadi kata-kata

        foreach ($keywords as $keyword) {
            foreach ($nameWords as $word) {
                if (strpos($keyword->keyword, $word) !== false) {
                    $matchedKeywords[] = $keyword;
                    break; // Jika sudah ditemukan, lanjutkan ke kata kunci berikutnya
                }
            }
        }

        return response()->json(['matchedKeywords' => $matchedKeywords]);
    }

    public function getKeywordsByCategory(Request $request, $category_id)
    {
        // Mengambil kategori beserta kata kunci yang terkait
        $category = Category::with('keywords')->find($category_id);

        if ($category) {
            // Mengembalikan kata kunci dalam bentuk JSON
            return response()->json($category->keywords);
        } else {
            return response()->json([]);
        }
    }
}
