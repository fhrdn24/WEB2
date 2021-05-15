<?php include('conn.php'); ?>
<? include('form.php'); ?>
<? include('prosesdaftar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD dengan PHP DAN MYSQL</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">CRUD PHP AND MYSQL</h1>
    <h2 class="text-center">DATA MAHASISWA</h2>

    <!-- Awal card form -->
    <div class="card mt-3">
  <div class="card-header bg-primary text-white">
    form input data mahasiswa
  </div>
  <div class="card-body">
    <form methode="post" action="">
    <div class="form-group">
    <label>Nim</label>
    <input type="text" name="tnim" class="form-control" place-holder="input Nim anda disini!" required>
    </div>
    <div class="form-group">
    <label>Nama</label>
    <input type="text" name="tnama" class="form-control" place-holder="input Nama anda disini!" required>
    </div>
    <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control" name="talamat" place-holder="input alamat anda disini!"></textarea>
    </div>
    <div class="form-group">
    <label>Program Studi</label>
    <select class="form-control" name="tprodi">
    <option></option>
    <option value="D3-IF">D3-Informatika</option>
    <option value="D3-TI">D3-Teknik Industri</option>
    <option value="D3-SI">D3-Sistem Informasi</option>
    </select>
    </div>
    <button type="submit" class="btn btn-success" name="bsimpan">simpan</button>
    <button type="submit" class="btn btn-danger" name="breset">reset</button>

    </form>
  </div>
</div>
<!--akhir card form -->
 <!-- Awal card tabel -->
    <div class="card mt-3">
  <div class="card-header bg-success text-white">
    Data mahasiswa
  </div>
  <div class="card-body">
   <table class="table table-bordered table-striped">
   <tr>
   <th>No.</th>
   <th>Nim</th>
   <th>Nama</th>
   <th>Alamat</th>
   <th>Program Studi</th>
   <th>Aksi</th>
   </tr>
   <?php
    $sql = "SELECT * FROM mhs";
    $query = mysqli_query($db, $sql);
    while($mahasiswa = mysqli_fetch_array($query));
    ?>
   <tr>
   <td><?$mahasiswa['no']?></td>
   <td><?$mahasiswa['nim']?></td>
   <td><?$mahasiswa['nama']?></td>
   <td><?$mahasiswa['alamat']?></td>
   <td><?$mahasiswa['prodi']?></td>
    <td>
   <a href="crud.php?hal=edit&id=<?=$mahasiswa['id_mhs']?>" class="btn btn-warning">Edit</a>
   <a href="crud.php?hal=hapus&id=<?=$mahasiswa['id_mhs']?>"
   onclick="return confirm('apakah anda yakin akan menghapus ini?')" class="btn btn-danger">Hapus</a>
   </td>
   </tr>

   </table>
  </div>
</div>
<!--akhir card tabel -->

</div>

</body>
</html>