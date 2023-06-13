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
    <div class="container p-5">
        <div class="btnhome">
            <a href="/pelanggaran">
                <- Point Pelanggaran</a>
        </div>
        <h1 class="text-center mb-5">Detail Pelanggaran</h1>
        <h2>Nama: {{ $karyawan[0]->nama }}</h2>
        <table class="table bg-white rounded">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Poin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggaran as $key => $pel)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $pel->keterangan_pelanggaran }}</td>
                        <td>{{ $pel->point }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
