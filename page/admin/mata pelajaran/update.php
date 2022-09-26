<?php 

    
$id_mapel = $_GET['id_mapel'];


    if(!isset($_GET['id_mapel'])) {
        header("location: index.php?page=matapelajaran");
    }

    $result = mysqli_query($conn, "select * from mapel where id_mapel='$id_mapel' ");

    $data = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) < 1) {
        header("location: index.php?page=matapelajaran");
    }





if(isset($_POST['update'])) {

    if(update_mapel($_POST) > 0) {

        echo "
                <script>
                    alert ('Data Mapel Berhasil Diupdate');
                    window.location.href='index.php?page=matapelajaran';
                </script>
            ";

    }else{

        echo "
                <script>
                    alert ('Data Mapel Gagal Diupdate');
                    window.location.href='index.php?page=matapelajaran';
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
	<title>Update Mata Pelajaran</title>
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
							<i class="fas fa-sync"> Update Mata Pelajaran</i>
						</h3>
					</div>
					<div class="card">
						<h5 class="card-header">Silahkan Update Mata Pelajaran</h5>
						<div class="card-body">
                            <form  action="" method="post" enctype="multipart/form-data">
                            
								<div class="form-group">
									<label for="inputText1" class="col-form-label">Kode Pelajaran</label>
									<input id="inputText1" type="text" name="kode_pelajaran" value="<?php echo $data['kode_pelajaran']; ?>" readonly class="form-control">
								</div>

								<div class="form-group">
									<label for="inputText2" class="col-form-label">Nama Mata Pelajaran</label>
									<input id="inputText2" type="text" name="nama_mapel" value="<?php echo $data['nama_mapel']; ?>" class="form-control">
								</div>

																			
								<div class="form-group">
									<label class="col-form-label">Keterangan</label>
									<select class="form-control" name="keterangan" id="">
                                        <option value="<?php echo $data['keterangan']; ?>"><?php echo $data['keterangan']; ?></option>
                                        <option value="Wajib">Wajib</option>
                                        <option value="Tambahan">Tambahan</option>
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