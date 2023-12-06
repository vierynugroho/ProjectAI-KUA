@extends('templates.template')

@section('content')
<div class="container d-flex mt-5">
    @if(session('error'))
    <div class="alert alert-danger">
        <b>Opps!</b> {{session('error')}}
    </div>
    @endif
    <div class="d-flex justify-content-evenly align-items-center w-100 mt-5">
        <div class="poster">
            <img src="./assets/ilustrator-login.png"
                 alt="poster headline"
                 class="img-fluid ">
        </div>

        <div class="border border-secondary shadow w-50 rounded-5 pb-5">
            <div class="text-center mt-4">
                <h3>LOGIN</h3>
                <p>Tidak punya akun? <b>Hubungi admin</b></p>
            </div>
            <div class="m-3 mt-5">
                <form action="{{ route('actionLogin') }}"
                      method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="Email"
                               class="form-label"><b>Email</b></label>
                        <input type="text"
                               class="form-control border-dark"
                               id="email"
                               name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password"
                               class="form-label"><b>Password</b></label>
                        <input type="password"
                               class="form-control border-dark"
                               id="password"
                               name="password">
                    </div>
                    <div class="d-flex justify-content-center align-items-center w100">
                        <button type="submit"
                                class="btn btn-warning w-75">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection