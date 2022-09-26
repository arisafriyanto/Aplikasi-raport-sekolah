<?php

    if(!isset($_GET['id_dk'])) {
        header("location: index.php?page=kelas_siswa");
    }

    $id_dk = $_GET['id_dk'];

    $result = mysqli_query($conn, "select * from kelas_siswa where id_dk='$id_dk' ");

    if(mysqli_num_rows($result) < 1) {
        header("location: index.php?page=kelas_siswa");
    }

    $data = mysqli_fetch_assoc($result);


	if(isset($_POST['update'])) {
		if(update_data_kelas($_POST) > 0) {
			echo "
					<script>
						alert ('Data Kelas Berhasil Diedit');
						window.location.href='index.php?page=kelas_siswa';
					</script>
				";
		}else{
			echo "<script>
						alert ('Data Kelas Gagal Diedit');
						window.location.href='index.php?page=kelas_siswa';
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
	<title>Update Data Kelas Siswa</title>
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
                                        <i class="fas fa-sync"> Update Data Kelas Siswa</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Update Data Kelas Siswa</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Kode Kelas Siswa</label>
                                                <input id="inputText1" type="text" name="kode_data_siswa" value="<?=$data['kode_data_siswa'];?>" readonly class="form-control">
                                            </div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nomor Induk Siswa</label>
												<input id="inputText2" type="text" name="nis" value="<?=$data['nis'];?>" readonly class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Kode Siswa</label>
												<input id="inputText2" type="text" name="kode_siswa" value="<?=$data['kode_siswa'];?>" readonly class="form-control">
											</div>

                                            <div class="form-group">
                                                <label for="inputText2" class="col-form-label">Kelas</label>
                                                <input id="inputText2" type="text" name="kelas" value="<?=$data['kelas'];?>" readonly class="form-control">
											</div>

<div class="form-group">
	<label for="inputText2" class="col-form-label">Nama Kelas</label>
	<input id="inputText2" type="text" name="nama_kelas" value="<?=$data['nama_kelas'];?>" readonly class="form-control">
</div>

<div class="form-group">
	<label for="inputText2" class="col-form-label">Tahun Ajaran</label>
	<input id="inputText2" type="text" name="tahun_ajaran" value="<?=$data['tahun_ajaran'];?>" readonly class="form-control">
</div>

<div class="form-group">
	<label for="inputText2" class="col-form-label">Nama Siswa</label>
	<input id="inputText2" type="text" name="nama_siswa" value="<?=$data['nama_siswa'];?>" readonly class="form-control">
</div>

<div class="form-group">
	<label for="inputText2" class="col-form-label">Nama Walikelas</label>
	<input id="inputText2" type="text" name="walikelas" value="<?=$data['walikelas'];?>" readonly class="form-control">
</div>

<div class="form-group">
	<label for="inputText2" class="col-form-label">Jurusan</label>
	<input id="inputText2" type="text" name="jurusan" value="<?=$data['jurusan'];?>" readonly class="form-control">
</div>

																						
											<div class="form-group">
												<label class="col-form-label">Status</label>
												<select class="form-control" name="status" id="">
													<option value="<?=$data['status'];?>"><?=$data['status'];?></option>
													<option value="Aktif">Aktif</option>
													<option value="Tidak Aktif">Tidak Aktif</option>
												</select>
											</div>
											
											<div style="float: right;">
											

                                            <button type="reset" class="btn btn-rounded btn-danger btn-sm">
                                                <i class="fas fa-sync-alt"> Reset</i>
											</button>
											

                                            <button type="submit" name="update" class="btn btn-rounded btn-info btn-sm">
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