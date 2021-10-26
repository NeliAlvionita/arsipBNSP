<?php
include '../koneksi.php';
date_default_timezone_set("Indonesia/Jakarta");
    $id = $_POST['id'];
    $nomor = $_POST['nomor'];
    $kategori = $_POST['kategori'];
    $judul = $_POST['judul'];
    $waktu = date("Y-m-d h:i:sa");

if(isset($_POST['simpan'])){
    extract($_POST);
    $nama_file = $_FILES['file']['name'];

    if(!empty($nama_file)){
        $lokasi_file = $_FILES['file']['tmp_name'];
        $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
        $file = $judul.".".$tipe_file;

        $folder = "../arsip/$file";
        move_uploaded_file($lokasi_file,"$folder");
    }else{
        $file="-";
    }
    
    $sql = "INSERT INTO tbarsip VALUES('$id','$nomor','$idkategori','$judul','$waktu','$file')";
    $query = mysqli_query($db, $sql);

    header("location:../index.php?p=arsip");
}
?>