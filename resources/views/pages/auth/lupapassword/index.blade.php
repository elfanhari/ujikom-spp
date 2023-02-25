<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SPP SMK REKAYASA - Lupa Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/sb-admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: #f8f9fc; font-family: 'Poppins';" >

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block justify-content-center" style="padding-top: 80px; background-color: #f5f5f5">
                                <img class="d-flex my-auto mx-auto rounded-circle" src="/img/e-spp-smk-rekayasa.png"
                                    alt="" style="width: 200px; margin-top: 200px;" />
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2 fw-bold">Lupa password?</h1>
                                        <p class="mb-4">Masukkan email terdaftar anda untuk melakukan reset password!
                                        </p>
                                    </div>
                                    <form class="user" action="/lupapassword" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <input type="text" name="email" value="{{ old('email') }}"
                                                class=" @error('email') is-invalid @enderror form-control text-black"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan email..." style="border-radius: 10px;">
                                                @error('email')
                                                <span class="invalid-feedback mt-1">{{ $message }}</span>
                                            @enderror
                                        </div>
                                       

                                        <button type="submit" class="btn btn-primary btn-block" style="border-radius: 10px;">
                                            Kirim
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="" href="/login">Login disini</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
