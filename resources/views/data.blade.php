@extends('templates.template')

@section('content')
@if(session('success'))
<div class="container">
    <div class="alert alert-success">
        <b>Yeayy!</b> {{session('success')}}
    </div>
</div>
@endif
<div class="container d-flex mt-5">
    <div class="justify-content-evenly align-items-center w-100">
        <div class="mt-5">
            <div class="row">
                <div class="col mt-3">
                    <h2>Data Pernikahan</h2>
                </div>
                <div class="col d-flex justify-content-end w-100 mt-3">
                    <a class="btn btn-warning w-50 fw-bold"
                       href="/data/create">Tambah Data</a>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered display table-hover"
                       id="dataTable">
                    <thead>
                        <tr class="table-success">
                            <th>No</th>
                            <th>Nama Pasangan</th>
                            <th>Status Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->DataPria->nama_lengkap }} - {{ $data->DataWanita->nama_lengkap }}</td>
                            <td>{{ $data->status_status ? 'Valid' : 'Invalid' }}</td>
                            <td>
                                <a class="btn btn-warning"
                                   href="data/{{ $data->id }}">Akurasi</a>
                                <a class="btn btn-primary"
                                   href="/data/{{ $data->id }}/edit"
                                   name="">Edit</a>
                                <button class="btn btn-danger"
                                        type="submit"
                                        name="">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection