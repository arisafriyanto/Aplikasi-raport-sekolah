<?php 

	if(isset($_POST['insert'])) {

		if(tambah_nilai($_POST) > 0) {

			echo "
					<script>
						alert ('Nilai Berhasil Ditambahkan');
						window.location.href='index.php?page=nilai';
					</script>
				";

		}else{

			echo "
					<script>
						alert ('Nilai Gagal Ditambahkan');
						window.location.href='index.php?page=nilai';
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
	<title>Tambah Data Nilai</title>
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
                                        <i class="fab fa-medrt"> Tambah Data Nilai</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Data Nilai</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

											<div class="form-group">
												<label class="col-form-label">Nama Siswa</label>
												<select class="form-control" name="nama_siswa" id="">
													<?php
													
														$sql = mysqli_query($conn, "select * from kelas_siswa ");
														while ($data = mysqli_fetch_array($sql, MYSQLI_NUM)) {
															echo 	"
																		<option value='$data[7]' >$data[7]</option>
																	";
														}
													
													?>
												</select>
											</div>



											<div class="form-group">
												<label class="col-form-label">Pelajaran</label>
												<select class="form-control" name="pelajaran" id="">
													<?php 
													
														$query = mysqli_query($conn, "select * from mapel ");
														while($data = mysqli_fetch_array($query, MYSQLI_NUM)) {

															echo    "
																		<option value='$data[2]'>$data[2]</option>
																	";

														}
														
													
													?>
												</select>
											</div>



											<div class="form-group">
												<label class="col-form-label">Semester</label>
												<select class="form-control" name="semester" id="">
													<option value="1">1 (Satu)</option>
													<option value="2">2 (Dua)</option>
												</select>
											</div>



											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Tugas 1</label>
												<input id="inputText2" type="text" type="text" name="nilai_tugas_1" placeholder="nilai tugas 1" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Tugas 2</label>
												<input id="inputText2" type="text" type="text" name="nilai_tugas_2" placeholder="nilai tugas 2" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Tugas 3</label>
												<input id="inputText2" type="text" type="text" name="nilai_tugas_3" placeholder="nilai tugas 3" class="form-control">
											</div>

                                            <div class="form-group">
                                                <label for="inputText2" class="col-form-label">Nilai Uts</label>
                                                <input id="inputText2" type="text" name="nilai_uts" placeholder="nilai uts" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Uas</label>
												<input id="inputText2" type="text" name="nilai_uas" placeholder="nilai uas" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Keterangan</label>
												<input id="inputText2" type="text" name="keterangan" placeholder="keterangan" class="form-control">
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