<?php 


    $result = mysqli_query($conn, "select max(kode_data_siswa) from kelas_siswa ");
    $datakode = mysqli_fetch_array($result, MYSQLI_NUM);

    if($datakode) {

        $nilaikode = substr($datakode[0], 2);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "DK" . str_pad($kode, 4, "0", STR_PAD_LEFT);

    }else{

        $hasilkode = "D0001";

    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tambah Data Kelas Siswa</title>
</head>
<body>
	

		<div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- pageheader  -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">

                                <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title" style="color: red;">
                                        <i class="fab fa-medrt"> Tambah Data Kelas Siswa</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Data Kelas Siswa</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Kode Data Siswa</label>
                                                <input id="inputText1" type="text" name="kode_data_siswa" value="<?php echo $hasilkode; ?>" readonly class="form-control">
                                            </div>

											<div class="form-group">
												<label class="col-form-label">Nama Kelas</label>
												<select class="form-control" name="nama_kelas" id="">
                                                    <?php 
                                                    
                                                        $query = mysqli_query($conn, "select * from kelas ");

                                                        
                                                        while ($data_kelas = mysqli_fetch_array($query, MYSQLI_NUM)) {

                                                        echo    "
                                                                    <option value='$data_kelas[2].$data_kelas[3].$data_kelas[4].$data_kelas[5]'>$data_kelas[2] ||  $data_kelas[3] $data_kelas[4]</option>
                                                                ";


                                                        }
                                                    
                                                    ?>
												</select>
                                            </div>                                            


											<div class="form-group">
												<label class="col-form-label">Jurusan</label>
												<select class="form-control" name="jurusan" id="">
                                                    <option value="Aphp">Aphp</option>
                                                    <option value="Akutansi">Akutansi</option>
                                                    <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                                    <option value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                                                    <option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
												</select>
                                            </div>


											<div class="form-group">
												<label class="col-form-label">Nama Siswa</label>
												<select class="form-control" name="nama_siswa" id="">
                                                    <?php 
                                                    
                                                        $query = mysqli_query($conn, "select * from siswa ");

                                                        
                                                        while ($data_siswa = mysqli_fetch_array($query, MYSQLI_NUM)) {

                                                        echo    "
                                                                    <option value='$data_siswa[1].$data_siswa[2].$data_siswa[5]'>$data_siswa[1] || $data_siswa[2] || $data_siswa[5]</option>
                                                                ";


                                                        }
                                                    
                                                    ?>
												</select>
                                            </div>

																						
											<div class="form-group">
												<label class="col-form-label">Status</label>
												<select class="form-control" name="status" id="">
													<option value="Aktif">Aktif</option>
													<option value="Tidak Aktif">Tidak Aktif</option>
												</select>
											</div>
											
											<div style="float: right;">
											

                                            <button type="reset" class="btn btn-rounded btn-danger btn-sm">
                                                <i class="fas fa-sync-alt"> Reset</i>
											</button>
											

                                            <button type="submit" name="insert" class="btn btn-rounded btn-info btn-sm">
                                                <i class="fas fa-paper-plane"> Submit</i>
											</button><br>
											

                                            </div>
                                        </form>


                                        <?php 
                
                                            if(isset($_POST['insert'])) {

                                                $kode_data_siswa = $_POST['kode_data_siswa'];

                                                $nama_data_kelas = $_POST['nama_kelas'];
                                                $pecah_nama_kelas = explode(".", $nama_data_kelas);
                                                $tahun_ajaran = $pecah_nama_kelas[0];
                                                $kelas = $pecah_nama_kelas[1];
                                                $nama_kelas = $pecah_nama_kelas[2];
                                                $walikelas = $pecah_nama_kelas[3];

                                                $jurusan = $_POST['jurusan'];

                                                $nama_data_siswa = $_POST['nama_siswa'];
                                                $pecah_nama_siswa = explode(".", $nama_data_siswa);
                                                $kode_siswa = $pecah_nama_siswa[0];
                                                $nis = $pecah_nama_siswa[1];
                                                $nama_siswa = $pecah_nama_siswa[2];
                                                $status = $_POST['status'];


                                                $result = mysqli_query($conn, "insert into kelas_siswa values
                                                (null, '$kode_data_siswa', '$nis', '$kode_siswa', '$nama_kelas', '$kelas', '$tahun_ajaran', '$nama_siswa', 
                                                '$status', '$walikelas', '$jurusan') ");

                                                if($result) {

                                                    echo "
                                                            <script>
                                                                alert ('Data Kelas Berhasil Ditambah');
                                                                window.location.href='index.php?page=kelas_siswa';
                                                            </script>
                                                        ";

                                                }else{

                                                    echo "
                                                            <script>
                                                                alert ('Data Kelas Gagal Ditambah');
                                                                window.location.href='index.php?page=kelas_siswa';
                                                            </script>
                                                        ";

                                                }


                                            }
                                    
                                    ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			
</body>
</html>