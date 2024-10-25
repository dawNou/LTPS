<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Feedback;
use App\Models\Post;
use PDF;
use Illuminate\Http\Request;

class PemilikController extends Controller
{
    public function daftarPengguna()
    {
        $users = User::where('is_pemilik', 0)->get(); // Mengambil semua pengguna kecuali pemilik
        return view('pemilik.pengguna', compact('users'));
    }

    public function daftarFeedback()
    {
        // dd('Route hit');
        $feedbacks = Feedback::with(['user', 'produk', 'pertanyaan'])
            ->get()
            ->groupBy('user_id');

        return view('pemilik.feedback', compact('feedbacks'));
    }

    public function daftarKonten()
    {
        $posts = Post::with('author')
            ->whereHas('author', function ($query) {
                $query->where('is_admin', true);
            })
            ->get()
            ->groupBy('user_id');

        return view('pemilik.konten', compact('posts'));
    }

    public function tambahAdmin(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Pastikan hanya pemilik yang dapat menambahkan admin
        if ($user->is_admin) {
            return redirect()->back()->with('error', 'Pengguna sudah menjadi admin.');
        }

        $user->is_admin = 1;
        $user->save();

        return redirect()->back()->with('success', 'Pengguna berhasil ditambahkan sebagai admin.');
    }

    public function hapusAdmin(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Pastikan hanya admin yang dapat menonaktifkan admin lain
        if (auth()->user()->user_id === $userId || !$user->is_admin) {
            return redirect()->back()->with('error', 'Tidak dapat menonaktifkan admin ini.');
        }

        $user->is_admin = 0;
        $user->save();

        return redirect()->back()->with('success', 'Pengguna berhasil dikembalikan menjadi pengguna biasa.');
    }

    public function downloadpdfpost()
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

    public function downloadpdffeedback()
    {
        // nyoba semua tabel
        $data = Feedback::with('user','produk', 'pertanyaan')->get()->groupBy('user_id');
        $pdf = PDF::loadView('dashboard.feedbacks.pdf', compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('feedbacks.pdf');
    }
}
