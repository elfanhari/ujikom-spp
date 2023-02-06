<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SPP - SMKN 3 Banjar</title>
    <link rel="stylesheet" href="./css/styles.css" />
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/my-css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/32f82e1dca.js" crossorigin="anonymous"></script>
</head>

<body>

    {{-- Sidebar --}}
    @include('partials.siswa.sidebar')
    {{-- End Sidebar --}}

    <main class="content flex-fill pb-0">
        <section>

            <nav class="nav-content gap-5">
                <button aria-controls="sidebar" data-bs-toggle="offcanvas" data-bs-target=".sidebar"
                    aria-label="Button Hamburger" class="sidebarOffcanvas mb-2 btn p-0 border-0 d-flex d-lg-none">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="d-flex gap-3 align-items-center">
                    @if (auth()->user()->userphoto)
                        <img src="/gallery/{{ auth()->user()->userphoto->url }}" alt="Photo Profile" class="photo-profile" />
                    @else
                        <img src="/img/profil.png" alt="Photo Profile" class="photo-profile" />
                    @endif
                    <div>
                        {{-- <p class="title-content mb-1">Beranda</p> --}}
                        <p class="subtitle-content">

                            <a href="#" class="btn-link">{{ auth()->user()->name }}</a>
                        </p>
                    </div>
                </div>
            </nav>
        </section>

        <section class="d-flex flex-column gap-4 pt-0">

            {{-- Content --}}

            @yield('content')

            {{-- End Content --}}

        </section>
    </main>

    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/siswa/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
