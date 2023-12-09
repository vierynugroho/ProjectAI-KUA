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
                               id="pria__nama_lengkap"
                               name="pria__nama_lengkap"
                               value="{{ old('pria__nama_lengkap') }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="pria__kk">Kartu Keluarga Pria</label>
                        <input type="file"
                               id="pria__kk"
                               name="pria__kk"
                               class="form-control @error('pria__kk')
                                    is-invalid
                                @enderror"
                               autofocus>
                        @error('pria__kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pria__ktp">KTP Pria</label>
                        <input type="file"
                               id="pria__ktp"
                               name="pria__ktp"
                               class="form-control @error('pria__ktp')
                                is-invalid
                            @enderror"
                               autofocus>
                        @error('pria__ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pria__akta-ayah">Akta Ayah Pria</label>
                        <input type="file"
                               id="pria__akta-ayah"
                               name="pria__akta_ayah"
                               class="form-control accordion @error('pria__akta_ayah')
                        is-invalid
                        @enderror"
                               autofocus>
                        @error('pria__akta_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pria__akta-ibu">Akta Ibu Pria</label>
                        <input type="file"
                               id="pria__akta-ibu"
                               name="pria__akta_ibu"
                               class="form-control @error('pria__akta_ibu')
                                is-invalid
                            @enderror"
                               autofocus>
                        @error('pria__akta_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="wanita__nama_lengkap">Nama Lengkap Wanita</label>
                        <input type="text"
                               id="wanita__nama_lengkap"
                               class="form-control"
                               name="wanita__nama_lengkap"
                               value="{{ old('wanita__nama_lengkap') }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="wanita__kk">Kartu Keluarga Wanita</label>
                        <input type="file"
                               id="wanita__kk"
                               name="wanita__kk"
                               class="form-control @error('wanita__kk')
                                is-invalid
                            @enderror"
                               autofocus>
                        @error('wanita__kk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wanita__ktp">KTP Wanita</label>
                        <input type="file"
                               id="wanita__ktp"
                               name="wanita__ktp"
                               class="form-control @error('wanita__ktp')
                                is-invalid
                            @enderror"
                               autofocus>
                        @error('wanita__ktp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta_ayah">Akta Ayah Wanita</label>
                        <input type="file"
                               id="wanita__akta_ayah"
                               name="wanita__akta_ayah"
                               class="form-control @error('wanita__akta_ayah')
                                is-invalid
                            @enderror"
                               autofocus>
                        @error('wanita__akta_ayah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta_ibu">Akta Ibu Wanita</label>
                        <input type="file"
                               id="wanita__akta_ibu"
                               name="wanita__akta_ibu"
                               class="form-control @error('wanita__akta_ibu')
                                is-invalid
                            @enderror"
                               autofocus>
                        @error('wanita__akta_ibu')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-warning d-block w-100 fw-bold">Tambah Data</button>
    </form>
</div>
@endsection