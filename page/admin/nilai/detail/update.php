<?php 

    if(!isset($_GET['id_nilai'])) {

        header("location: index.php?page=nilai");

    }

    $id_nilai = $_GET['id_nilai'];

    $sql = mysqli_query($conn, "select * from nilai where id_nilai='$id_nilai' ");

    $data = mysqli_fetch_assoc($sql);

        if(isset($_POST['update'])) {

            if(update_nilai($_POST) > 0) {
                                    
                echo "
                        <script>
                            alert ('Nilai Berhasil Diupdate');
                            window.location.href='index.php?page=nilai';
                        </script>
                    ";

            }else{
                
                echo "
                        <script>
                            alert ('Nilai Gagal Diupdate');
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
	<title>Update Data Nilai</title>
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
                                    <h3 class="section-title text-danger" >
                                        <i class="fas fa-sync"> Update Data Nilai</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Update Data Nilai</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Pelajaran</label>
                                                <input id="inputText1" type="text" name="pelajaran" value="<?=$data['pelajaran']?>" readonly class="form-control">
                                            </div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Semester</label>
												<input id="inputText2" type="text" name="semester" value="<?=$data['semester']?>" readonly class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Tugas 1</label>
												<input id="inputText2" type="text" name="nilai_tugas_1" value="<?=$data['nilai_tugas_1']?>" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Tugas 2</label>
												<input id="inputText2" type="text" name="nilai_tugas_2" value="<?=$data['nilai_tugas_2']?>" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Tugas 3</label>
												<input id="inputText2" type="text" name="nilai_tugas_3" value="<?=$data['nilai_tugas_3']?>" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Uts</label>
												<input id="inputText2" type="text" name="nilai_uts" value="<?=$data['nilai_uts']?>" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nilai Uas</label>
												<input id="inputText2" type="text" name="nilai_uas" value="<?=$data['nilai_uas']?>" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Keterangan</label>
												<input id="inputText2" type="text" name="keterangan" value="<?=$data['keterangan']?>" class="form-control">
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