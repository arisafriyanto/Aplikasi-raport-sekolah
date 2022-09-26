<?php


    $query = mysqli_query($conn, "select max(kode_kelas) from kelas ");
    $datakode = mysqli_fetch_array($query, MYSQLI_NUM);

    if($datakode) {

        $nilaikode = substr($datakode[0], 1);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "K" . str_pad($kode, 4, "0", STR_PAD_LEFT);

    }else{

        $hasilkode = "K0001";

    }


	if(isset($_POST['insert'])) {
		if(tambah_kelas($_POST) > 0) {
			echo "
					<script>
						alert ('Data Kelas Berhasil Ditambah');
						window.location.href='index.php?page=kelas';
					</script>
				";
		}else{
			echo "<script>
						alert ('Data Kelas Gagal Ditambah');
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
	<title>Tambah Data Kelas</title>
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
                                        <i class="fab fa-medrt"> Tambah Data Kelas</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Data Kelas</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Kode Kelas</label>
                                                <input id="inputText1" type="text" name="kode_kelas" value="<?php echo $hasilkode; ?>" readonly class="form-control">
                                            </div>

											<div class="form-group">
												<label class="col-form-label">Kelas</label>
												<select class="form-control" name="nama_kelas" id="">
													<option value="X">X</option>
													<option value="XI">XI</option>
													<option value="XII">XII</option>
												</select>
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nama Kelas</label>
												<input id="inputText2" type="text" name="kelas" placeholder="nama kelas" class="form-control">
											</div>

											<div class="form-group">
												<label for="inputText2" class="col-form-label">Nama Walikelas</label>
												<input id="inputText2" type="text" name="nama_walikelas" placeholder="nama walikelas" class="form-control">
											</div>

                                            <div class="form-group">
                                                <label for="inputText2" class="col-form-label">Tahun Ajaran</label>
                                                <input id="inputText2" type="text" name="tahun_ajaran" placeholder="2019/2020" class="form-control">
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