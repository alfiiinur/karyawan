</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* Webpixels CSS */
    /* Utility and component-centric Design System based on Bootstrap for fast, responsive UI development */
    /* URL: https://github.com/webpixels/css */

    @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

    /* Bootstrap Icons */
    @import url("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.0/font/bootstrap-icons.min.css");
</style>

<body>


    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
            id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="/adminDashboard">
                    <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="...">
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <!-- Toggle -->
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder"
                                    src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                    class="avatar avatar- rounded-circle">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/karyawan">
                                <i class="bi bi-people"></i> Data Karyawan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/izin">
                                <i class="bi bi-bookmarks"></i> Data Perizinan
                            </a>
                        </li>
                        @if (Auth::user()->level == 'admin')
                            <li class="nav-item">
                                <a class="nav-link" href="/pelanggaran">
                                    <i class="bi bi-bookmarks"></i> Point Pelangaran
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/absensi">
                                <i class="bi bi-bookmarks"></i> Data Absensi
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20">
                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                        </li>
                        <form action="/logout" method="POST">
                            @csrf
                            <li class="nav-item">
                                <button type="submit" href="/logout">
                                    <i class="bi bi-box-arrow-left"></i> Logout
                                </button>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="h-screen flex-grow-1 overflow-y-lg-auto px-3">

            <form action="/karyawan/{{ $karyawan->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col my-3 flex-col my-3">
                    <div class="input-group mb-3 my-3 rounded-pill overflow-hidden rounded">
                        <span class="input-group-text bg-white border-0 pe-1" id="basic-addon1">
                            <i class="bi bi-house" style="width:16px; height:16px;"></i>
                        </span>
                        <input class="form-control hide-focus border-0" type="text" name="nama"
                            placeholder="Nama Karyawan" value="{{ $karyawan->nama }}" />
                    </div>
                    <div class="input-group mb-3 my-3 rounded-pill overflow-hidden rounded">
                        <span class="input-group-text bg-white border-0 pe-1" id="basic-addon1">
                            <i class="bi bi-people" style="width:16px; height:16px;"></i>
                        </span>
                        <input class="form-control hide-focus border-0" type="text" name="ttl"
                            placeholder="Tempat Tanggal Lahir" value="{{ $karyawan->ttl }}" />
                    </div>
                    <div class="input-group mb-3 my-3 rounded-pill overflow-hidden rounded">
                        <span class="input-group-text bg-white border-0 pe-1" id="basic-addon1">
                            <i class="bi bi-people" style="width:16px; height:16px;"></i>
                        </span>
                        <input class="form-control hide-focus border-0" type="text" name="no_rek"
                            placeholder="Tempat Tanggal Lahir" value="{{ $karyawan->no_rek }}" />
                    </div>
                    <div class="input-group mb-3 my-3 rounded-pill overflow-hidden border">
                        <span class="input-group-text bg-white border-0 pe-1" id="basic-addon1">
                            <i class="bi bi-telephone" style="width:16px; height:16px;"></i>
                        </span>
                        <input type="text" class="form-control hide-focus  border-0" placeholder="Alamat Karyawan"
                            aria-label="Username" aria-describedby="basic-addon1" name="alamat"
                            value="{{ $karyawan->alamat }}">
                    </div>
                    <div class="input-group mb-3 my-3 rounded-pill overflow-hidden rounded">
                        <span class="input-group-text bg-white border-0 pe-1" id="basic-addon1">
                            <i class="bi bi-people" style="width:16px; height:16px;"></i>
                        </span>
                        <input class="form-control hide-focus border-0" type="text" name="no_telepon"
                            placeholder="Nomor Telepon" value="{{ $karyawan->no_telepon }}" />
                    </div>

                </div>
                <button type="submit" name="submit" class="btn btn-primary my-2">Submit</button>
            </form>
        </div>
    </div>


</body>

</html>
