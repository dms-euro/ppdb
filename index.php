<?php
require_once('koneksi.php');
$sql = "SELECT * FROM sekolah";
$result = $conn->query($sql);

$daftar_sekolah = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid">
        <div class="card">
            <center>
                <img src="img/img.png" width="70%"> 
            </center>


        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">DAFTAR SEKOLAH</h3>
            </div>
            <div class="card-body">
                <p class="text-center">Berikut ini merupakan daftar SMP yang mengikuti PPDB Online Kota Karanganyar.
                    Ditampilkan alamat serta identitas dari tiap sekolah. Untuk lebih lanjut silahkan klik Lihat Profil
                    pada masing-masing sekolah.</p>

            </div>
        </div>
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data Sekolah
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <tr class="text-info">
                        <th rowspan="2" style="vertikal-align:middle;">#</th>
                        <th>kode</th>
                        <th>nama_sekolah</th>
                        <th>kelurahan</th>
                        <th>kecamatan</th>
                        <th>status_sekolah</th>
                        <th>ikut_ppdb</th>
                        <th>profil</th>
                    </tr>
                    <tr>
                        <th><input type="text" class="from-control"></th>
                        <th><input type="text" class="from-control"></th>
                        <th><input type="text" class="from-control"></th>
                        <th><input type="text" class="from-control"></th>
                        <th><input type="text" class="from-control"></th>
                        <th><input type="text" class="from-control"></th>
                        <th></th>
                    </tr>
                    <?php
                    foreach ($daftar_sekolah as $key => $row) {
                        ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $row['kode'] ?></td>
                            <td><?= $row['nama_sekolah'] ?></td>
                            <td><?= $row['kelurahan'] ?></td>
                            <td><?= $row['kecamatan'] ?></td>
                            <td>
                                <?php if ($row['status_sekolah'] == 'negri') { ?>
                                    <div class="badge bg-success">negri</div>
                                <?php } else { ?>
                                    <div class="badge bg-primary"> swasta</div>
                                <?php } ?>
                            </td>

                            <td>
                                <?php if ($row['ikut_ppdb'] == 'iya') { ?>
                                    <div class="badge bg-success">iya</div>
                                <?php } else { ?>
                                    <div class="badge bg-primary">tidak</div>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-info text-white">lihat profil</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data sekolah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="creat.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="number" name="kode" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelurahan</label>
                            <input type="text" name="kelurahan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keecamatan</label>
                            <input type="text" name="kecamatan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Sekolah</label>
                            <select name="status_sekolah" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="negri">Negri</option>
                                <option value="swasta">Swasta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ikut PPDB</label>
                            <select name="ikut_ppdb" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="iya">iya</option>
                                <option value="tidak">tidak</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
