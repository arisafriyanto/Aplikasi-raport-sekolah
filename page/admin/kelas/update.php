<?php

    if(!isset($_GET['id_kelas'])) {
        header("location: index.php?page=kelas");
    }

    $id_kelas = $_GET['id_kelas'];

    $result = mysqli_query($conn, "select * from kelas where id_kelas='$id_kelas' ");

    if(mysqli_num_rows($result) < 1) {
        header("location: index.php?page=kelas");
    }

    $data = mysqli_fetch_assoc($result);


	if(isset($_POST['update'])) {
		if(update_kelas($_POST) > 0) {
			echo "
					<script>
						alert ('Data Kelas Berhasil Diedit');
						window.location.href='index.php?page=kelas';
					</script>
				";
		}else{
			echo "<script>
						alert ('Data Kelas Gagal Diedit');
						window.location.href='index.php?page=kelas';
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
	<title>Update Data Kelas</title>
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
                                        <i class="fas fa-sync"> Update Data Kelas</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Update Data Kelas</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Kode Kelas</label>
                                                <input id="inputText1" type="text" name="kode_kelas" value="<?=$data['kode_kelas'];?>" readonly class="form-control">
                                            </div>

											<div class="form-group">
												<label class="col-form-label">Kelas</label>
												<select class="form-control" name="nama_kelas" id="">
													<option value="<?=$data['nama_kelas']?>"><?=$data['nama_kelas']?></option>
													<option value="X">X</option>
													<option value="XI">XI</option>
													<option value="XII">XII</option>
												</select>
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nama Kelas</label>
												<input id="inputText2" type="text" name="kelas" value="<?=$data['kelas'];?>" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nama Walikelas</label>
												<input id="inputText2" type="text" name="nama_walikelas" value="<?=$data['nama_walikelas'];?>" class="form-control">
											</div>

                                            <div class="form-group">
                                                <label for="inputText2" class="col-form-label">Tahun Ajaran</label>
                                                <input id="inputText2" type="text" name="tahun_ajaran" value="<?=$data['tahun_ajaran'];?>" class="form-control">
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