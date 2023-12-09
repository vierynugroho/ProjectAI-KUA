@extends('templates.template')

@section('content')
<div class="container mt-5"
     style="background-color: whitesmoke">
    <h3 class="mb-5">Akurasi Data Pernikahan</h3>
    <form action="{{ route('actionAkurasi',$data->id) }}"
          method="POST"
          enctype="multipart/form-data">
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
                        <label for="pria__nama_lengkap">Nama Lengkap Pria</label>
                        <input type="text"
                               class="form-control"
                               id="pria__nama_lengkap"
                               name="pria__nama_lengkap"
                               value="{{ $data->DataPria->pria__nama_lengkap }}">
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
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataPria->pria__kk)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="pria__kk"
                               name="pria__kk"
                               value="{{ $data->DataPria->pria__kk}}"
                               disabled>
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
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataPria->pria__ktp)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="pria__ktp"
                               name="pria__ktp"
                               value="{{ $data->DataPria->pria__ktp }}"
                               disabled>
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
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataPria->pria__akta_ayah)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="pria__akta-ayah"
                               name="pria__akta-ayah"
                               value="{{ $data->DataPria->pria__akta_ayah }}"
                               disabled>
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
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataPria->pria__akta_ibu)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="pria__akta-ibu"
                               name="pria__akta-ibu"
                               value="{{ $data->DataPria->pria__akta_ibu }}"
                               disabled>
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
                               value="{{ $data->DataWanita->wanita__nama_lengkap }}">
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
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataWanita->wanita__kk)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="wanita__kk"
                               name="wanita__kk"
                               value="{{ $data->DataWanita->wanita__kk }}"
                               disabled>
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
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataWanita->wanita__ktp)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="wanita__ktp"
                               name="wanita__ktp"
                               value="{{ $data->DataWanita->wanita__ktp }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ayah">Akta Ayah Wanita</label>
                        @if ($data->DataWanita->wanita__cf_akta_ayah == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataWanita->wanita__akta_ayah)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="wanita__akta-ayah"
                               name="wanita__akta-ayah"
                               value="{{ $data->DataWanita->wanita__akta_ayah }}"
                               disabled>
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ibu">Akta Ibu Wanita</label>
                        @if ($data->DataWanita->wanita__cf_akta_ibu == 1)
                        <span class="badge text-bg-success">
                            Valid
                        </span>
                        @else
                        <span class="badge text-bg-danger">
                            Invalid
                        </span>
                        @endif
                        <p class="text-danger fst-italic small">
                            @if (!$data->DataWanita->wanita__akta_ibu)
                            {{ ' * Data Kosong' }}
                            @endif
                        </p>
                        <input type="text"
                               class="form-control"
                               id="wanita__akta-ibu"
                               name="wanita__akta-ibu"
                               value="{{ $data->DataWanita->wanita__akta_ibu }}"
                               disabled>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-warning d-block w-100 fw-bold">Akurasi Data</button>
    </form>
</div>
@endsection