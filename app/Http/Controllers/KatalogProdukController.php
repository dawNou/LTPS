<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Katprod;

use Illuminate\Http\Request;

class KatalogProdukController extends Controller
{
    public function index()
    {
        $title = '';
        $mainCategoriesLimit = 3; // Batas kategori utama

        // Memfilter produk berdasarkan kategori jika ada
        if (request('katprod')) {
            $katprod = Katprod::firstWhere('slug', request('katprod'));
            $title = ' dengan Kategori ' . $katprod->namakatprod;
        }

        // Ambil semua kategori
        $katprods = Katprod::all();

        // Pisahkan kategori utama dan kategori tambahan
        $mainCategories = $katprods->take($mainCategoriesLimit);
        $additionalCategories = $katprods->slice($mainCategoriesLimit);

        return view('produks', [
            "title" => "Lilin Tiga Putra Sejahtera" . $title,
            "active" => 'produks',
            "produks" => Produk::latest()->filter(request(['search', 'katprod']))->paginate(7)->withQueryString(),
            "mainCategories" => $mainCategories,
            "additionalCategories" => $additionalCategories
        ]);
    }

    public function show(Produk $produk)
    {
        return view('produk', [
            "title" => "Detail Produk",
            "active" => 'produks',
            "produk" => $produk
        ]);
    }


}
