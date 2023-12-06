@extends('templates.template')

@section('content')
<div class="container d-flex mt-5">
    <div class="justify-content-evenly align-items-center w-100">
        <div class="mt-5">
            <div class="row">
                <div class="col mt-3">
                    <h2>Data Pernikahan</h2>
                </div>
                <div class="col d-flex justify-content-end w-100 mt-3">
                    <a class="btn btn-warning w-50 fw-bold"
                       href="/akurasi-data">Tambah Data</a>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered display table-hover"
                       id="dataTable">
                    <thead>
                        <tr class="table-success">
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Data Pernikahan</th>
                            <th>Status Data</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>
                                <button class="btn btn-warning"
                                        type="submit"
                                        name="">Akurasi</button>
                                <button class="btn btn-primary"
                                        type="submit"
                                        name="">Edit</button>
                                <button class="btn btn-danger"
                                        type="submit"
                                        name="">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection