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
                               name="pria__nama"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="pria__kk">Kartu Keluarga Pria</label>
                        <input type="file"
                               class="form-control"
                               id="pria__kk"
                               name="pria__kk">
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
                        <label for="wanita__nama">Nama Lengkap Wanita</label>
                        <input type="text"
                               class="form-control"
                               id="wanita__nama"
                               name="wanita__nama"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="wanita__kk">Kartu Keluarga Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita__kk"
                               name="wanita__kk">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__ktp">KTP Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita__ktp"
                               name="wanita__ktp">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ayah">Akta Ayah Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita__akta-ayah"
                               name="wanita__akta-ayah">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ibu">Akta Ibu Wanita</label>
                        <input type="file"
                               class="form-control"
                               id="wanita__akta-ibu"
                               name="wanita__akta-ibu">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-warning d-block w-100 fw-bold">Tambah Data</button>
    </form>
</div>
@endsection