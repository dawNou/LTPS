<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use PDF;
// use Barryvdh\DomPDF\Facade\PDF;

// use Barryvdh\DomPDF\Facade as PDF;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ambilkan data Post, yang userId sama dengan user yang lagi login
        // return view('dashboard.posts.index', [
        //     'posts' => Post::with('category', 'keywords')->where('user_id', auth()->user()->user_id)->get()
        // ]);
        return view('dashboard.posts.index', [
            'posts' => Post::with('category', 'keywords')->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('keywords')->get();
        return view('dashboard.posts.create', compact('categories'));
        // return view('dashboard.posts.create', [
        //     'categories' => Category::all()
        // ]);
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
            'title' => 'required|max:100',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|exists:categories,category_id',
            'image' => 'required|image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // $validatedData['user_id'] = auth()->user()->user_id;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // Post::create($validatedData);
        $post = Post::create($validatedData);

        $category = Category::with('keywords')->find($request->category_id);

        if ($category) {
            $keywordIds = $category->keywords->pluck('keyword_id')->toArray();
            $post->keywords()->attach($keywordIds);
        }

        return redirect('/dashboard/posts')->with('success', 'Konten Baru Telah Ditambahkan!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:100',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::where('post_id', $post->post_id)
            ->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Konten Telah Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }

        Post::destroy($post->post_id);

        return redirect('/dashboard/posts')->with('success', 'Konten Telah Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function downloadpdf()
    {
        // Ambil semua data post dengan category dan author
        $posts = Post::with(['category', 'author'])->get();

        // Kelompokkan data berdasarkan penulis
        $groupedByAuthor = $posts->groupBy(function ($item) {
            return $item->author->name; // atau menggunakan 'username' jika nama author tidak tersedia
        });

        $pdf = PDF::loadView('dashboard.posts.pdf', ['groupedByAuthor' => $groupedByAuthor]);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('posts.pdf');
    }

    public function getKeywords($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['keywords' => []]);
        }

        // Ambil kata kunci yang terkait dengan kategori
        $keywords = $category->keywords()->pluck('name')->toArray();

        return response()->json([
            'keywords' => $keywords
        ]);
    }
}
