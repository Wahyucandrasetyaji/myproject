<!DOCTYPE html>

    <?php
        include 'koneksi.php';

        $id_siswa = '';
        $nisn = '';
        $nama_lengkap = '';
        $jenis_kelamin = '';
        $alamat = '';

        if(isset($_GET['edit'])){
            $id_siswa = $_GET['edit'];

            $query = "SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa';";
            $sql = mysqli_query($connection, $query);

            $result = mysqli_fetch_assoc($sql);

            $nisn = $result['nisn'];
            $nama_lengkap = $result['nama_lengkap'];
            $jenis_kelamin = $result['jenis_kelamin'];
            $alamat = $result['alamat'];
        }
        
    ?>

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
    <nav class="navbar bg-body-tertiary mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
            CRUD
            </a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
            <div class="mb-3 row">
                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                    <input type="text" name ="nisn" class="form-control" id="nisn" placeholder="Ex: 112233" required value="<?php echo $nisn; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama lengkap"  class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_lengkap" class="form-control" id="nama lengkap" placeholder="Ex: Haikal Dwi Susanto" value="<?php echo $nama_lengkap; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jenis kelamin"  class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select required id="jkel" name="jenis_kelamin" class="form-select">
                            <option selected>Jenis Kelamin</option>
                            <option <?php if($jenis_kelamin == 'Laki-laki'){echo "selected";} ?> value="Laki-laki">Laki-laki</option>
                            <option <?php if($jenis_kelamin == 'Perempuan'){echo "selected";} ?> value="Perempuan" >Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="alamat lengkap" name="alamat" rows="3"><?php echo $alamat; ?></textarea>
                    </div>
                </div>
                <div class="mb-3 row mt-4">
                    <div class="col">
                        <?php
                            if(isset($_GET['edit'])){
                        ?>
                            <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        <?php
                            } else {
                        ?>
                            <button type="submit" name="aksi" value="add" class="btn btn-primary">
                                Tambahkan
                            </button>
                        <?php
                            }
                        ?>
                        <a href="index.php" type="button" class="btn btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
        </form>
    </div>
</body>
</html>