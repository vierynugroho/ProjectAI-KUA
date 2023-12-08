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
                        <label for="pria__nama">Nama Lengkap Pria</label>
                        <input type="text"
                               class="form-control"
                               id="pria__nama"
                               name="pria__nama"
                               value="{{ $data->DataPria->nama_lengkap }}">
                    </div>
                    <div class="mb-3">
                        <label for="pria__kk">Kartu Keluarga Pria</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataPria->kk)
                            {{ $data->DataPria->kk }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="pria__kk"
                               name="pria__kk"
                               value="{{ Storage::url($data->DataPria->kk) }}">
                    </div>
                    <div class="mb-3">
                        <label for="pria__ktp">KTP Pria</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataPria->ktp)
                            {{ $data->DataPria->ktp }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="pria__ktp"
                               name="pria__ktp"
                               value="{{ $data->DataPria->ktp }}">
                    </div>
                    <div class="mb-3">
                        <label for="pria__akta-ayah">Akta Ayah Pria</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataPria->akta_ayah)
                            {{ $data->DataPria->akta_ayah }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="pria__akta-ayah"
                               name="pria__akta-ayah"
                               value="{{ $data->DataPria->akta_ayah }}">
                    </div>
                    <div class="mb-3">
                        <label for="pria__akta-ibu">Akta Ibu Pria</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataPria->akta_ibu)
                            {{ $data->DataPria->akta_ibu }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="pria__akta-ibu"
                               name="pria__akta-ibu"
                               value="{{ $data->DataPria->akta_ibu }}">
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
                               value="{{ $data->DataWanita->nama_lengkap }}">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__kk">Kartu Keluarga Wanita</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataWanita->kk)
                            {{ $data->DataWanita->kk }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="wanita__kk"
                               name="wanita__kk"
                               value="{{ $data->DataWanita->kk }}">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__ktp">KTP Wanita</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataWanita->ktp)
                            {{ $data->DataWanita->ktp }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="wanita__ktp"
                               name="wanita__ktp"
                               value="{{ $data->DataWanita->ktp }}">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ayah">Akta Ayah Wanita</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataWanita->akta_ayah)
                            {{ $data->DataWanita->akta_ayah }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="wanita__akta-ayah"
                               name="wanita__akta-ayah"
                               value="{{ $data->DataWanita->akta_ayah }}">
                    </div>
                    <div class="mb-3">
                        <label for="wanita__akta-ibu">Akta Ibu Wanita</label>
                        <small class="text-danger fst-italic">
                            @if ($data->DataWanita->akta_ibu)
                            {{ $data->DataWanita->akta_ibu }}
                            @else
                            {{ ' * Data Kosong' }}
                            @endif
                        </small>
                        <input type="file"
                               class="form-control"
                               id="wanita__akta-ibu"
                               name="wanita__akta-ibu"
                               value="{{ $data->DataWanita->akta_ibu }}">
                    </div>
                </div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-warning d-block w-100 fw-bold">Akurasi Data</button>
    </form>
</div>
@endsection