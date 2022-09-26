<?php


	if(!isset($_GET['id_siswa'])) {
		header("location: index.php?page=siswa");
	}

	$id_siswa = $_GET['id_siswa'];

	$query = mysqli_query($conn, "select * from siswa where id_siswa='$id_siswa' ");


	if(mysqli_num_rows($query) < 1) {
		header("location: index.php?page=siswa");
	}


	$data = mysqli_fetch_assoc($query);

	@$jk = ($data['jenis_kelamin'] == L)?"Laki - laki":"Perempuan";


	if(isset($_POST['update'])) {
		if(update_siswa($_POST) > 0) {
			echo "
					<script>
						alert ('Data Siswa Berhasil Diubah');
						window.location.href='index.php?page=siswa';
					</script>
				";
		}else{
			echo "<script>
						alert ('Data Siswa Gagal Diubah');
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
	<title>Update Data Siswa</title>
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
							<i class="fas fa-sync"> Update Data Siswa</i>
						</h3>
					</div>
					<div class="card">
						<h5 class="card-header">Silahkan Update Data Siswa</h5>
						<div class="card-body">
							<form  action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_siswa" id="" value="<?=$data['id_siswa']?>">
								<input type="hidden" name="fotosiswalama" id="" value="<?=$data['foto_siswa']?>">

								<div class="form-group">
									<label for="inputText1" class="col-form-label">Kode Siswa</label>
									<input id="inputText1" type="text" name="kode_siswa" value="<?php echo $data['kode_siswa']; ?>" readonly class="form-control">
								</div>

								<div class="form-group">
									<label for="inputText2" class="col-form-label">Nomor Induk Siswa</label>
									<input id="inputText2" type="text" name="nis" value="<?php echo $data['nis']; ?>" class="form-control">
								</div>
								


								<div class="form-row">
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom03">Username</label>
										<input type="text" class="form-control" id="validationCustom03" name="username" value="<?php echo $data['username']; ?>">
									</div>


									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom04">Password</label>
										<input class="form-control" id="validationCustom04" type="text" name="password" value="<?php echo $data['password']; ?>" readonly>
									</div>
								</div><br>




								<div class="form-row">
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom05">Nama Siswa</label>
										<input type="text" class="form-control" id="validationCustom05" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>">
									</div>

									
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom06">Confirm Password</label>
										<input class="form-control" id="validationCustom06" type="text" name="password2" value="<?php echo $data['password']; ?>" readonly>
									</div>
								</div>


								
								<div class="form-group">
									<label for="exampleFormControlTextarea1">Alamat</label>
									<textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"><?=$data['alamat'] ?></textarea>
								</div>

								<div class="form-group">
									<label for="inputText5" class="col-form-label">Tempat Lahir</label>
									<input id="inputText5" type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" class="form-control">
								</div>

																			
								<div class="form-group">
									<label for="inputText7" class="col-form-label">Tanggal Lahir</label>
									<input id="inputText7" type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" class="form-control">
								</div>



								<div class="form-row">
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom09">Jenis Kelamin</label>		
											<select class="form-control" name="jenis_kelamin" id="">
												<option value="<?=$data['jenis_kelamin']?>"><?=$jk?></option>
												<option value="L">Laki - laki</option>
												<option value="P">Perempuan</option>
											</select>
									</div>

									
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom010">No.Telp</label>
										<input class="form-control" id="validationCustom010" type="number" name="telepon" value="<?php echo $data['telepon']; ?>">
									</div>
								</div><br>


								<div class="form-row">
									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom07">Agama</label>
											<select class="form-control" name="agama" id="">
												<option value="<?=$data['agama']?>"><?=$data['agama']?></option>
												<option value="Islam">Islam</option>
												<option value="Kristen">Kristen</option>
												<option value="Khatolik">Khatolik</option>
												<option value="Budha">Budha</option>
												<option value="Konghucu">Konghucu</option>
											</select>
									</div>


									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-2">
										<label for="validationCustom08">Tahun Angkatan</label>
										<input class="form-control" id="validationCustom08" type="text" name="tahun_angkatan" value="<?php echo $data['tahun_angkatan']; ?>">
									</div>
								</div>



								<label class="col-form-label">Foto Siswa</label>
								<div class="custom-file mb-3">
									<input type="file" name="foto_siswa" class="custom-file-input" id="customFile"><br><br>
										<center><img width="150px;" src="../../assets/img/siswa/<?=$data['foto_siswa'];?>" alt=""></center>
									<label class="custom-file-label" for="customFile">
										<i class="fas fa-image"> Pilih Foto</i>
									</label>
								</div><br><br>


																			
								<div class="form-group">
									<label class="col-form-label">Status</label>
									<select class="form-control" name="status" id="">
										<option value="<?=$data['status']?>"><?=$data['status'];?></option>
										<option value="Aktif">Aktif</option>
										<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
								
								<div style="float: right;">
								

								<button type="reset" class="btn btn-rounded btn-danger btn-sm">
									<i class="fas fa-sync-alt"> Reset</i>
								</button>
								

								<button type="submit" name="update" class="btn btn-rounded btn-info btn-sm">
									<i class="fas fa-paper-plane"> Update</i>
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