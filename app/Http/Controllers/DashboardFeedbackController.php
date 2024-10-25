<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Pertanyaan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class DashboardFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::with(['produk', 'pertanyaan', 'user'])->where('user_id', auth()->user()->id)->get();
        return view('dashboard.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produks = Produk::all();
        $pertanyaans = Pertanyaan::all();
        return view('dashboard.feedbacks.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk_id = $request->input('produk_id');
        // #1
        // $user_id = Auth::user_id(); // Menggunakan ID pelanggan yang sudah login
        // #2
        // $user_id = Auth::id(); // Menggunakan ID pelanggan yang sudah login
        // #3
        // $user_id = auth()->user()->user_id; // Menggunakan ID pelanggan yang sudah login
        $user_id = auth()->user()->id;


        foreach ($request->input('jawabans') as $pertanyaan_id => $jawaban) {
            Feedback::create([
                'produk_id' => $produk_id,
                'pertanyaan_id' => $pertanyaan_id,
                'user_id' => $user_id,
                'jawaban' => $jawaban
            ]);
        }

        return redirect('/dashboard/feedbacks')->with('success', 'Umpan Balik Anda Telah Dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        Feedback::destroy($feedback->feedback_id);

        return redirect('/dashboard/feedbacks')->with('success', 'Umpan Balik Anda Telah Dihapus!');
    }

    public function getPertanyaansByProduk($produkId)
    {
        $produk = Produk::find($produkId);
        $katprod_id = $produk->katprod_id;
        $pertanyaans = Pertanyaan::where('katprod_id', $katprod_id)->get();

        return response()->json(['pertanyaans' => $pertanyaans]);
    }

    
}
