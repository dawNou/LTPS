<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Keyword;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use PDF;

use Illuminate\Support\Facades\File;

class AdminFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::with(['user', 'produk', 'pertanyaan'])
            ->get()
            ->groupBy('user_id');

        return view('dashboard.admin_feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
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
        //
    }

    public function prosesFeedback()
    {
        // Ambil semua jawaban dari tabel feedback
        $jawaban = Feedback::pluck('jawaban');

        // Daftar kata yang tidak relevan
        $stopWords = [
            'dan', 'atau', 'tetapi', 'namun', 'sehingga', 'karena', 'sebab', 'jika', 'maka', 'itu', 'ini', 'saya', 'kamu', 'dia', 'mereka', 'kami', 'kita', 'anda', 'yang', 'dengan', 'ke', 'di', 'dari', 'pada', 'untuk', 'adalah', 'sebagai', 'oleh', 'serta', 'hingga', 'agar', 'meskipun', 'walaupun', 'tanpa', 'tentang', 'kepada', 'antara', 'sudah', 'belum', 'masih', 'telah', 'akan', 'anda', 'sangat', 'saat', 'cukup', 'terjadi', 'melainkan', 'padahal', 'sedangkan', 'bahwa', 'supaya', 'kalau', 'apabila', 'bila', 'sejak', 'semenjak', 'sampai', 'maupun', 'ketika', 'selama', 'sebelum', 'sesudah', 'setelah', 'tidak', 'iya', 'ya', 'aku', 'kami', 'kita', 'dia', 'ia', 'mereka', 'kalian', 'tersebut', 'juga', 'selain', 'pasti', 'terasa', 'banget', 'lain', 'dapat', 'berlebih'
        ];

        $frequency = [];
        foreach ($jawaban as $teks) {
            $kata = explode(' ', $teks);
            foreach ($kata as $kata_tunggal) {
                $kata_tunggal = strtolower($kata_tunggal);
                // Pastikan hanya menyimpan kata yang valid (alphanumeric)
                // apabila ingin ada angkanya
                // if (preg_match('/^[a-z0-9]+$/', $kata_tunggal)) 
                if (preg_match('/^[a-z]+$/', $kata_tunggal)) 
                {
                    // Lewati kata jika ada dalam daftar stop words
                    if (in_array($kata_tunggal, $stopWords)) {
                        continue;
                    }
                    if (array_key_exists($kata_tunggal, $frequency)) {
                        $frequency[$kata_tunggal]++;
                    } else {
                        $frequency[$kata_tunggal] = 1;
                    }
                }
            }
        }

        // Urutkan kata kunci berdasarkan frekuensi dari yang terbanyak
        arsort($frequency);

        foreach ($frequency as $kata => $jumlah) {
            try {
                Keyword::updateOrInsert(
                    ['keyword' => $kata],
                    ['frequency' => $jumlah]
                );
            } catch (\Exception $e) {
                // Log error untuk debugging
                Log::error('Error updating/inserting keyword: ' . $e->getMessage());
            }
        }


        return redirect()->back()->with('success', 'Frekuensi kata telah dihitung dan disimpan.');
    }

    public function showKeywords()
    {
        $keyword = Keyword::all();
        $chunks = $keyword->chunk(25);
        $allKeywords = Keyword::all();

        return view('dashboard.keywords.index', compact('chunks', 'allKeywords'));
    }

    // Percobaan Keempat Filter
    public function filter(Request $request)
    {
        // default
        $filters = $request->input('filters', []);

        // Simpan filters ke dalam session
        // default
        session(['keyword_filters' => $filters]);

        // Ambil dan urutkan sesuai abjad
        $allKeywords = Keyword::orderBy('keyword')->get(); // Untuk opsi di dropdown

        // Ambil kata kunci yang sesuai dengan filter
        $keywords = empty($filters)
            ? Keyword::all()
            : Keyword::whereIn('keyword', $filters)->get();

        return view('dashboard.keywords.index', [
            'chunks' => $keywords->chunk(20),
            'allKeywords' => $allKeywords,
            'filters' => $filters // Kirim filters ke view
        ]);
    }

    public function downloadpdf()
    {
        // nyoba semua tabel
        $data = Feedback::with('user','produk', 'pertanyaan')->get()->groupBy('user_id');
        $pdf = PDF::loadView('dashboard.feedbacks.pdf', compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('feedbacks.pdf');
    }
}
