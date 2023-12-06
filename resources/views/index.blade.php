@extends('templates.template')

@section('content')
<div class="container d-flex justify-content-evenly align-items-center w-100">
    <div class="headline">
        <h1>Layanan <span class="text-warning ">Data</span>
            <br>
            Kantor Urusan Agamaa <br> Kecamatan Sutojayan
        </h1>
        <p class="small text-muted ">Digitalisasi data dan akurasi data yang tepat meningkatkan efisiensi, <br>
            efektivitas
            dan hubungan dengan masyarakat yang
            kuat!</p>
        <button class="btn btn-warning fw-bold mt-3">Coba Sekarang</button>
    </div>
    <div class="poster">
        <img src="./assets/ilustrator-beranda.png"
             alt="poster headline"
             class="img-fluid ">
    </div>
</div>
@endsection