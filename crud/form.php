<?
if(isset($_POST['bsimpan']))
{
  $simpan = mysqli_query($db, "INSERT INTO mhs(nim, nama, alamat, prodi)
                              VALUES ('$_POST[tnim]';
                                     '$_POST[tnama]';
                                     '$_POST[talamat]';
                                     '$_POST[tprodi]');
                              ");
  if($simpan)
  {
    echo "<script>
    alert('simpan data sukses');
    document.location='crud.php';
    </script>";
  } else {
    echo"<script>
    alert('simpan data gagal');
    document.location='crud.php';
    </script>;
  }                           
}
?>