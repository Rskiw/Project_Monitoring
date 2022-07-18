<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$Pname = $_POST['Pname'];
$client = $_POST['client'];
// $gambar = $_POST['gambar'];
$gambar = $_POST['gambar'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$Sdate = date("Y-m-d", strtotime($_POST['Sdate']));
$Edate = date("Y-m-d", strtotime($_POST['Edate']));
$prog = $_POST['prog'];
mysqli_query($koneksi,"update mon set project_name='$Pname', client='$client', gambar='$gambar', nama='$nama', email='$email', start_date='$Sdate', end_date='$Edate', progress='$prog' where No='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
function upload(){
    $nama_file= $_FILES['gambar']['name'];
    $tipe_file=$_FILES['gambar']['type'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];

    //cek apakah ada gambar yang di upload
    if($error === 4){
        echo "<script>alert('tidak ada gambar yang di upload')</script>";
        return false;
    }
    //cek tipe file
    $ekstiensi_file_falid =['jpeg','jpg','png'];
    $ekstesiFile = explode(".",$nama_file);
    $ekstesiFile= strtolower(end($ekstesiFile));
    if(!in_array($ekstesiFile,$ekstiensi_file_falid)){
        echo "<script>alert('yang anda upload bukan gamber')</script>";
        return false;
    }

    //cek ukuran file
    if($size>1500000){
        echo "<script>alert('tidak Ukuran file terlau bersar')</script>";
        return false;
    }
    //jika lolos dari pengecerkan
    move_uploaded_file($tmp_name,"img/".$nama_file);
    return $nama_file;
}


// menginput data ke database

 
?>