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
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-2 p-2">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Data Karyawan</h1>
                            </div>
                            <!-- Actions -->
                            @if (Auth::user()->level == 'admin')
                                <div class="col-sm-6 col-12 text-sm-end">
                                    <div class="mx-n1">
                                        <a href="/karyawan/create" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                            <span class=" pe-2">
                                                <i class="bi bi-plus"></i>
                                            </span>
                                            <span>Create Karyawan</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Data Pegawai</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap ">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama Pegawai</th>
                                        <th scope="col">Tempat Tanggal Lahir</th>
                                        <th scope="col">Nomor Rekening</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Nomor Telepon</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($karyawan as $karyawan)
                                        @php($i = 0)
                                        <tr>
                                            <td>
                                                {{ $i += $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $karyawan->nama }}
                                            </td>
                                            <td>
                                                {{ $karyawan->ttl }}
                                            </td>
                                            <td>
                                                {{ $karyawan->no_rek }}
                                            </td>
                                            <td>
                                                {{ $karyawan->alamat }}
                                            </td>
                                            <td>
                                                {{ $karyawan->no_telepon }}
                                            </td>
                                            @if (Auth::user()->level == 'admin')
                                                <td class="text-end">
                                                    <a href="/karyawan/{{ $karyawan->id }}"
                                                        class="btn btn-sm  btn-square btn-success my-3">Edit</a>
                                                    <form action="/karyawan/{{ $karyawan->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"onclick="return confirm(`Apakah anda yakin untuk menghapus data?`)"
                                                            class="btn btn-sm btn-square btn-danger text-danger-hover-blue">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            {{-- {{ $warga->links() }} --}}
                        </div>
                        <div class="card-footer border-0 py-5">
                            <ul class="pagination pg-blue">
                                <li class="page-item ">
                                    <a class="page-link" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link">1</a></li>
                                <li class="page-item ">
                                    <a class="page-link">2 </a>
                                </li>
                                <li class="page-item"><a class="page-link">3</a></li>
                                <li class="page-item ">
                                    <a class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
