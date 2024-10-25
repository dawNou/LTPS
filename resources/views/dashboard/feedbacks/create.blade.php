@extends('dashboard.layouts.main')

@section('title', 'Buat Umpan Balik')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">
    Buat Umpan Balik
  </h1>
</div>

{{-- form --}}
<div class="col-lg-8">
  {{-- action digabung dengan method akan mengarah ke method store yang ada di controller--}}
  {{--
  method get => index
  method post => store
  method put => update
  method delete => destroy
  --}}

  {{-- <form method="post" action="/dashboard/feedbacks"> --}}
  <form method="post" action="{{ route('feedbacks.store') }}">

    {{-- karena menggunakan form, pake csrf --}}
    @csrf

    <div class="form-group mb-3">
      <label for="produk_id">
        <h3>Produk:</h3>
      </label>
      <select name="produk_id" id="produk_id" class="form-control" style="width: 300px;" required>
        <option value="">
          Pilih Produk
        </option>
        @foreach ($produks as $produk)
        <option value="{{ $produk->produk_id }}">
          {{ $produk->nama_produk }}
        </option>
        @endforeach
      </select>
    </div>

    <div id="pertanyaans-container" class="form-group mb-3" style="display:none;">
      <h3>Pertanyaan:</h3>
      <div id="pertanyaans"></div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3" id="submit-button" style="display:none;">
      Buat Umpan Balik
    </button>
  </form>
</div>

<script>
  document.getElementById('produk_id').addEventListener('change', function() {
      var produkId = this.value;
      var pertanyaansContainer = document.getElementById('pertanyaans-container');
      var pertanyaansDiv = document.getElementById('pertanyaans');
      pertanyaansDiv.innerHTML = '';
      pertanyaansContainer.style.display = 'none';
      document.getElementById('submit-button').style.display = 'none';

      if (produkId) {
          fetch(`/get-pertanyaans-by-produk/${produkId}`)
              .then(response => response.json())
              .then(data => {
                  if (data.pertanyaans && data.pertanyaans.length > 0) {
                      data.pertanyaans.forEach(pertanyaan => {
                          var div = document.createElement('div');
                          div.className = 'form-group';
                          div.innerHTML = `
                              <label for="pertanyaan_${pertanyaan.pertanyaan_id}">${pertanyaan.soal}</label>
                              
                              <textarea name="jawabans[${pertanyaan.pertanyaan_id}]" id="pertanyaan_${pertanyaan.pertanyaan_id}" class="form-control mb-4" required></textarea>
                          `;
                          pertanyaansDiv.appendChild(div);
                      });
                      pertanyaansContainer.style.display = 'block';
                      document.getElementById('submit-button').style.display = 'block';
                  }
              });
      }
  });

  // Prevent multiple form submissions
  document.querySelector('form').addEventListener('submit', function(event) {
      var submitButton = document.getElementById('submit-button');
      submitButton.disabled = true;
  });
</script>

@endsection