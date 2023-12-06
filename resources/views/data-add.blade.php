@extends('templates.template')

@section('content')
<div class="container mt-5"
     style="background-color: whitesmoke">
    <h3 class="mb-5">Tambah Data Pernikahan</h3>
    <form action="/data"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="hidden"
                           name="pria__id"
                           value="{{ $id }}">
                    <input type="hidden"
                           name="wanita__id"
                           value="{{ $id }}">
                    <div class="mb-3">
                        <label for="pria__nama">Nama Lengkap Pria</label>
                        <input type="text"
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
                        <label for="pria__akta-ibu">Akta Ibu Pria</label>
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
                        <input type="text"
                               class="form-control"
                               id="wanita_nama"
                               name="wanita__nama">
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
                        <label for="wanita_akta-ibu">Akta Ibu Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita_akta-ibu"
                               name="wanita_akta-ibu">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-warning d-block w-100 fw-bold">Tambah Data</button>
    </form>
</div>
@endsection