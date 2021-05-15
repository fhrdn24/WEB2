<?php
include("config.php"); ?>
<?
//pengujian edit data mahasiswa
if($_GET['hal'] == "edit")

//data akan diedit
$edit = mysqli_query($db, "UPDATE mhs set
nim = '$_POST[tnim]'
nim = '$_POST[tnama]'
alamat = '$_POST[talamat]'
prodi = '$_POST[tprodi]'
WHERE id_mhs = '$_GET[id]'
");
if($edit) //jika edit sukses
{
    echo "<script>
    alert('edit data sukses');
    document.location='crud.php';
    </script>";

}else {
    echo "<script>
    alert('edit data gagal');
    document.location='crud.php';
    </script>";
}
?>
