<?php
    include 'koneksi.php';

    $query = "SELECT * FROM tbl_siswa;";
    $sql = mysqli_query($connection, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" >
        <script src="js/bootstrap.bundle.min.js" ></script>

        <title>Home</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            Website Data Siswa 
            </a>
        </div>
    </nav>
    <!--  judul -->
    <div class="container">
        <h1 class="mt-4">DATA SISWA</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Data yang telah disimpan di dalam database</p>
            </blockquote>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">Tambah Data</a>
        <div class="table-responsive">
            <table class="table align-middle table-border table-hover">
            <thead>
                <tr>
                    <th><center>No.</center></th>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
                <tr>
                    <td><center>
                        <?php echo ++$no; ?>.
                    </center></td>
                    <td>
                        <?php echo $result['nisn']; ?>
                    </td>
                    <td>
                        <?php echo $result['nama_lengkap']; ?>
                    </td>
                    <td>
                        <?php echo $result['jenis_kelamin']; ?>
                    </td>
                    <td>
                        <?php echo $result['alamat']; ?>
                    </td>
                    <td>
                        <a href="kelola.php?edit=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">Edit</a>
                        <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin untuk menghapus data tersebut?')">Hapus</a>
                    </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>