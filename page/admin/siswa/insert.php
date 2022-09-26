<?php 

	$query = mysqli_query($conn, "select max(kode_siswa) from siswa ");
	$datakode = mysqli_fetch_array($query, MYSQLI_NUM);

	if($datakode) {

		$nilaikode = substr($datakode[0], 1);
		$kode = (int) $nilaikode;
		$kode = $kode + 1;
		$hasilkode = "S". str_pad($kode, 4, "0", STR_PAD_LEFT);


	}else{
		$hasilkode = "S0001";
	}


	if(isset($_POST['insert'])) {
		if(tambah_siswa($_POST) > 0) {
			echo "
					<script>
						alert ('Data Siswa Berhasil Ditambah');
						window.location.href='index.php?page=siswa';
					</script>
				";
		}else{
			echo "<script>
						alert ('Data Siswa Gagal Ditambah');
						window.location.href='index.php?page=siswa';
					</script>
				";
		}
	}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tambah Data Siswa</title>
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
                                    <h3 class="section-title" style="color: blue;">
                                        <i class="fab fa-medrt"> Tambah Data Siswa</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Data Siswa</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Kode Siswa</label>
                                                <input id="inputText1" type="text" name="kode_siswa" value="<?php echo $hasilkode; ?>" readonly class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputText2" class="col-form-label">Nomor Induk Siswa</label>
                                                <input id="inputText2" type="text" name="nis" placeholder="nomor induk siswa" class="form-control">
											</div>
											


											<div class="form-row">
												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom03">Username</label>
													<input type="text" class="form-control" id="validationCustom03" name="username" placeholder="username">
												</div>


												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom04">Password</label>
													<input class="form-control" id="validationCustom04" type="password" name="password" placeholder="password">
												</div>
											</div><br>




											<div class="form-row">
												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom05">Nama Siswa</label>
													<input type="text" class="form-control" id="validationCustom05" name="nama_siswa" placeholder="nama siswa">
												</div>

												
												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom06">Confirm Password</label>
													<input class="form-control" id="validationCustom06" type="password" name="password2" placeholder="confirm password">
												</div>
											</div>


											
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Alamat</label>
                                                <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
											</div>

											<div class="form-group">
												<label for="inputText5" class="col-form-label">Tempat Lahir</label>
												<input id="inputText5" type="text" name="tempat_lahir" placeholder="tempat lahir" class="form-control">
											</div>

																						
											<div class="form-group">
												<label for="inputText7" class="col-form-label">Tanggal Lahir</label>
												<input id="inputText7" type="date" name="tanggal_lahir" class="form-control">
											</div>



											<div class="form-row">
												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom09">Jenis Kelamin</label>		
														<select class="form-control" name="jenis_kelamin" id="">
															<option value="L">Laki - laki</option>
															<option value="P">Perempuan</option>
														</select>
												</div>

												
												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom010">No.Telp</label>
													<input class="form-control" id="validationCustom010" type="number" name="telepon" placeholder="telepon">
												</div>
											</div><br>


											<div class="form-row">
												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom07">Agama</label>
														<select class="form-control" name="agama" id="">
															<option value="Islam">Islam</option>
															<option value="Kristen">Kristen</option>
															<option value="Khatolik">Khatolik</option>
															<option value="Budha">Budha</option>
															<option value="Konghucu">Konghucu</option>
														</select>
												</div>


												<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
													<label for="validationCustom08">Tahun Angkatan</label>
													<input class="form-control" id="validationCustom08" type="text" name="tahun_angkatan" placeholder="2019/2020">
												</div>
											</div>



											<label class="col-form-label">Foto Siswa</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" name="foto_siswa" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">
                                                    <i class="fas fa-image"> Pilih Foto</i>
                                                </label>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
			
</body>
</html>