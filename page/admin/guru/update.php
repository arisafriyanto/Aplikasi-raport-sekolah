<?php


	if(!isset($_GET['id_guru'])) {
		header("location: index.php?page=guru");
	}

	$id_guru = $_GET['id_guru'];

	$query = mysqli_query($conn, "select * from guru where id_guru='$id_guru' ");


	if(mysqli_num_rows($query) < 1) {
		header("location: index.php?page=guru");
	}


	$data = mysqli_fetch_assoc($query);

	@$jk = ($data['jenis_kelamin'] == L)?"Laki - laki":"Perempuan";


	if(isset($_POST['update'])) {
		if(update_guru($_POST) > 0) {
			echo "
					<script>
						alert ('Data Guru Berhasil Diubah');
						window.location.href='index.php?page=guru';
					</script>
				";
		}else{
			echo "<script>
						alert ('Data Guru Gagal Diubah');
						window.location.href='index.php?page=guru';
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
	<title>Update Data Guru</title>
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
						<h3 class="section-title" style="color: green;">
							<i class="fas fa-sync"> Update Data Guru</i>
						</h3>
					</div>
					<div class="card">
						<h5 class="card-header">Silahkan Update Data Guru</h5>
						<div class="card-body">
							<form  action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="id_guru" id="" value="<?=$data['id_guru']?>">
								<input type="hidden" name="fotogurulama" id="" value="<?=$data['foto_guru']?>">

								<div class="form-group">
									<label for="inputText1" class="col-form-label">Kode Guru</label>
									<input id="inputText1" type="text" name="kode_guru" value="<?php echo $data['kode_guru']; ?>" readonly class="form-control">
								</div>

								<div class="form-group">
									<label for="inputText2" class="col-form-label">Nomor Induk Pegawai</label>
									<input id="inputText2" type="number" name="nip" value="<?php echo $data['nip']; ?>" class="form-control">
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
										<label for="validationCustom05">Nama Guru</label>
										<input type="text" class="form-control" id="validationCustom05" name="nama_guru" value="<?php echo $data['nama_guru']; ?>">
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


								<label class="col-form-label">Foto Guru</label>
								<div class="custom-file mb-3">
									<input type="file" name="foto_guru" class="custom-file-input" id="customFile"><br><br>
										<center><img width="150px;" src="../../assets/img/guru/<?=$data['foto_guru'];?>" alt=""></center>
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