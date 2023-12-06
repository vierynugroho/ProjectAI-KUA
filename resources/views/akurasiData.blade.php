@extends('templates.template')

@section('content')
<div class="container mt-5"
     style="background-color: whitesmoke">
    <h3 class="mb-5">Akurasi Data Pernikahan</h3>
    {{-- type your code here --}}
    <form action=""
          method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="pria__nama">Nama Lengkap Pria</label>
                        <input type="email"
                               class="form-control"
                               id="pria__nama"
                               name="pria__nama">
                    </div>
                    <div class="mb-3">
                        <label for="pria__kartu-keluarga">Kartu Keluarga Pria</label>
                        <input type="file"
                               class="form-control"
                               id="pria__kartu-keluarga"
                               name="pria__kartu-keluarga">
                    </div>
                    <div class="mb-3">
                        <label for="pria__ktp">KTP Pria</label>
                        <input type="file"
                               class="form-control"
                               id="pria__ktp"
                               name="pria__ktp">
                    </div>
                    <div class="mb-3">
                        <label for="pria__akta-ayah">Akta Ayah Pria</label>
                        <input type="file"
                               class="form-control"
                               id="pria__akta-ayah"
                               name="pria__akta-ayah">
                    </div>
                    <div class="mb-3">
                        <label for="pria__akta-ibu">Nama Lengkap Pria</label>
                        <input type="file"
                               class="form-control"
                               id="pria__akta-ibu"
                               name="pria__akta-ibu">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="wanita_nama">Nama Lengkap Wanita</label>
                        <input type="email"
                               class="form-control"
                               id="wanita_nama"
                               name="wanita_nama">
                    </div>
                    <div class="mb-3">
                        <label for="wanita_kartu-keluarga">Kartu Keluarga Pria</label>
                        <input type="file"
                               class="form-control"
                               id="wanita_kartu-keluarga"
                               name="wanita_kartu-keluarga">
                    </div>
                    <div class="mb-3">
                        <label for="wanita_ktp">KTP Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita_ktp"
                               name="wanita_ktp">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ayah">Akta Ayah Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita__akta-ayah"
                               name="wanita__akta-ayah">
                    </div>
                    <div class="mb-3">
                        <label for="wanita_akta-ibu">Nama Lengkap Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita_akta-ibu"
                               name="wanita_akta-ibu">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-warning d-block w-100 fw-bold">Kalkulasi</button>
    </form>
</div>
@endsection