<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/landing_page.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Landing Page</title>
</head>


<body>
    <!-- NAV -->
    <div class="navbar">
        <div class="logo">
            <img src="assets/images/img2.png" alt="logo">
        </div>
        <div class="nav-links">
            <ul>
                {{-- <li><a href="#home">Home</a></li>
                <li><a href="#timeline">Kelompok</a></li> --}}
                <div class="btn btn-warning">
                    <a href="/login">LOGIN</a>
                </div>
                <div class="btn btn-success">
                    <a href="/register">REGISTER</a>
                </div>

            </ul>
        </div>
    </div>
    <!-- CLOSE NAV -->


    <!-- Section: Design Block -->
    <section class=" ">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: fff">
            <div class="container">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0" id="home">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            Selamat Datang Di PT VARA<br />
                            <span class="text-primary">for your business</span>
                        </h1>
                        <p style="color: hsl(217, 10%, 50.8%)">
                            Kami melakukan pencatan barang-barang sampah yang ada. Entah itu barang dari plastik
                            atapun barang-barang lainnya, di sini kami mempermudah pencatatan barang sampah yang ada
                        </p>
                        <a href="" class="btn btn-danger">About</a>
                    </div>

                    <div class="col-lg-5 mb-5 mb-lg-1">
                        <div class="container px-2 " style="width:900px;">
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>

    <!-- Section: Design Block -->



</body>

</html>
