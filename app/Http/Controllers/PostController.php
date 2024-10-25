<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' dengan Kategori : ' . $category->name;
        }

        if(request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' oleh : ' . $author->name;
        }

        // Ambil kategori dan pisahkan kategori utama dan tambahan
        $allCategories = Category::all();
        $mainCategories = $allCategories->take(5); // Ambil 5 kategori utama
        $additionalCategories = $allCategories->skip(5); // Kategori sisanya

        return view('posts', [
            "title" => "Lilin Tiga Putra Sejahtera" . $title,
            "active" => 'posts',
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
            "mainCategories" => $mainCategories,
            "additionalCategories" => $additionalCategories
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Detail Konten",
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
