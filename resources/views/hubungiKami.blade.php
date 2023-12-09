@extends('templates.template')

@section('content')
<div class="container m-5">
    {{-- type your code here --}}
    <h4>Google Map</h4>

    <div class="d-flex p-2">
        <div class="row d-flex justify-content-between align-items-center w-100 flex-column flex-lg-row">
            <div class="col">
                <div class="maps">
                    <iframe class="border rounded"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.238642374113!2d112.20642701032371!3d-8.178697591818558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78ea9749418cdd%3A0x7e6c2f1092465c0c!2sKantor%20Urusan%20Agama!5e0!3m2!1sid!2sid!4v1701356323916!5m2!1sid!2sid"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col">
                <div class="info m-5">
                    <div>
                        <h6>Alamat</h6>
                        <p>
                            Jl. Letjen Witarmin, Kedung Bunder, <br>
                            Kec. Sutojayan,, Kab. Blitar, Jawa Timur, 66172
                        </p>
                    </div>
                    <div class="pt-3">
                        <h6>Telepon</h6>
                        <p>0802934883420</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection