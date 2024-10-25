<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produk;
use App\Models\Katprod;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil data produk, misalnya produk terbaru
        $produks = Produk::latest()->take(7)->get();

        // Ambil kategori produk dengan relasi produk
        $katprods = Katprod::with('produk')->get();


        // Kirim data ke view
        return view('home', [
            'produks' => $produks,
            'title' => 'Beranda',
            "active" => 'beranda',
            'katprods' => $katprods
        ]);
    }
}
