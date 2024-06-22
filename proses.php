<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add") {

            $nisn = $_POST['nisn'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];

            $query = "INSERT INTO tbl_siswa VALUES(null, '$nisn', '$nama_lengkap', '$jenis_kelamin', '$alamat' )";
            $sql = mysqli_query($connection, $query);

            if($sql){
                header("location: index.php");
            } else {
                echo $query;
            }

        } else if ($_POST['aksi'] == "edit") {
            //echo "Edit Data <a href='index.php'>[Home]</a>";

            $id_siswa = $_POST['id_siswa'];
            $nisn = $_POST['nisn'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];

            $query = "UPDATE tbl_siswa SET nisn='$nisn', nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE  id_siswa='$id_siswa';";
            $sql = mysqli_query($connection, $query);

            if($sql){
                header("location: index.php");
            } else {
                echo $query;
            }
        }
    }

    if(isset($_GET['hapus'])){
        $id_siswa = $_GET['hapus'];
        $query = "DELETE FROM tbl_siswa WHERE id_siswa = '$id_siswa';";
        $sql = mysqli_query($connection, $query);

        if($sql){
            header("location: index.php");
        } else {
            echo $query;
        }
        //echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>