<!doctype html>
<html lang="en">

    <head>
        <title>Project AI - KUA</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
              rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
              crossorigin="anonymous">
        <link rel="stylesheet"
              href="{{ asset('css/app.css') }}">

        {{-- Datatable --}}
        <link href="{{ asset('vendor/datatables/css/dataTables.bootstrap5.min.css') }}"
              rel="stylesheet">

        {{-- JQuery --}}
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    </head>

    <body>
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 1440 320">
            <path fill="#FFDE59"
                  fill-opacity="1"
                  d="M0,160L48,149.3C96,139,192,117,288,122.7C384,128,480,160,576,154.7C672,149,768,107,864,112C960,117,1056,171,1152,192C1248,213,1344,203,1392,197.3L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
        <header>
            <!-- place navbar here -->
            @include('components.navbar')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            <!-- place footer here -->
            @include('components.footer')
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous">
        </script>


        {{-- JQUERY --}}
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        {{-- JQUERY --}}

        <!-- Datatables -->
        <script src="{{ asset('vendor/datatables/dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap5.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
        @stack('addon-script')
    </body>

</html>