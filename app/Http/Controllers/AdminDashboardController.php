<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyword;
use App\Models\Produk;
use App\Models\Feedback;
use App\Models\Katprod;
use App\Models\Pertanyaan;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboardHitung() {
        // Menghitung jumlah data di masing-masing tabel
        $feedbackCount = Feedback::count();
        $keywordCount = Keyword::count();
        $katblogCount = Category::count();
        $kontenblogCount = Post::count();
        $produkCount = Produk::count();
        $katprodCount = Katprod::count();
        $pertCount = Pertanyaan::count();
    
        // Mengirim data ke view
        return view('dashboard.index', [
            'feedbackCount' => $feedbackCount,
            'keywordCount' => $keywordCount,
            'katblogCount' => $katblogCount,
            'kontenblogCount' => $kontenblogCount,
            'produkCount' => $produkCount,
            'katprodCount' => $katprodCount,
            'pertanyaanCount' => $pertCount,
        ]);
    }
}
