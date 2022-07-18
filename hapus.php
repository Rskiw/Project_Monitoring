<?php 
// koneksi database
include 'koneksi.php';
 
$id = $_GET['No'];
mysqli_query($koneksi,"delete from mon where No='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");

 
?>