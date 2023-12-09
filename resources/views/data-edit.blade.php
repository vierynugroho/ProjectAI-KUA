@extends('templates.template')

@section('content')
<div class="container m-5 mx-auto">
    <h3 class="mb-5">Edit Data Pernikahan</h3>
    <form action="{{ route('data.update',$data->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <input type="hidden"
                           name="pria__id"
                           value="{{ $data->DataPria->id }}">
                    <input type="hidden"
                           name="wanita__id"
                           value="{{ $data->DataWanita->id }}">
                    <div class="mb-3">
                        <label for="pria__nama">Nama Lengkap Pria</label>
                        <input type="text"
                               class="form-control"
                               id="pria__nama_lengkap"
                               name="pria__nama_lengkap"
                               value="{{ $data->DataPria->pria__nama_lengkap }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="pria__kk">Kartu Keluarga Pria</label>
                        @if ($data->DataPria->pria__cf_kk == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataPria->pria__kk)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataPria->pria__kk }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                        @if ($data->DataPria->pria__cf_ktp == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataPria->pria__ktp)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataPria->pria__ktp }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                        @if ($data->DataPria->pria__cf_akta_ayah == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataPria->pria__akta_ayah)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataPria->pria__akta_ayah }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                        @if ($data->DataPria->pria__cf_akta_ibu == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataPria->pria__akta_ibu)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataPria->pria__akta_ibu }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                               value="{{ $data->DataWanita->wanita__nama_lengkap }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="wanita__kk">Kartu Keluarga Wanita</label>
                        @if ($data->DataWanita->wanita__cf_kk == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataWanita->wanita__kk)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataWanita->wanita__kk }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                        @if ($data->DataWanita->wanita__cf_ktp == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataWanita->wanita__ktp)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataWanita->wanita__ktp }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                        @if ($data->DataWanita->wanita__cf_akta_ayah == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataWanita->wanita__akta_ayah)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataWanita->wanita__akta_ayah }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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
                        @if ($data->DataWanita->wanita__cf_akta_ibu == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        @if ($data->DataWanita->wanita__akta_ibu)
                        <p class="small fs-italic text-muted">
                            {{ $data->DataWanita->wanita__akta_ibu }}
                        </p>
                        @else
                        <p class="small fs-italic text-danger">
                            * Data Belum Diisi
                        </p>
                        @endif
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

        <div class="row">
            <div class="col-8">
                <button type="submit"
                        class="btn btn-warning btn-block w-100 fw-bold">Simpan Data</button>
            </div>
            <div class="col-4">
                <a href="/data"
                   class="btn btn-secondary btn-block w-100 fw-bold">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection