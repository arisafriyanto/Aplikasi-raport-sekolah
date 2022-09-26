<?php 

    $result = mysqli_query($conn, "select max(kode_pelajaran) from mapel");
    $datakode = mysqli_fetch_array($result, MYSQLI_NUM );

    if($datakode) {

        $nilaikode  = substr($datakode[0], 1);
        $kode  = (int) $nilaikode;
        $kode       = $kode + 1;
        $hasilkode  = "P" . str_pad($kode, 4, "0", STR_PAD_LEFT);


    }else{

        $hasilkode = "P0001";

    }



    if(isset($_POST['insert'])) {

        if(tambah_mapel($_POST) > 0) {

            echo "
					<script>
						alert ('Data Mapel Berhasil Ditambah');
						window.location.href='index.php?page=matapelajaran';
					</script>
				";

        }else{

            echo "
					<script>
						alert ('Data Mapel Berhasil Ditambah');
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
	<title>Tambah Mata Pelajaran</title>
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
                                        <i class="fab fa-medrt"> Tambah Mata Pelajaran</i>
                                    </h3>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Silahkan Isi Mata Pelajaran</h5>
                                    <div class="card-body">
										<form  action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="inputText1" class="col-form-label">Kode Pelajaran</label>
                                                <input id="inputText1" type="text" name="kode_pelajaran" value="<?php echo $hasilkode; ?>" readonly class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="inputText2" class="col-form-label">Nama Mata Pelajaran</label>
                                                <input id="inputText2" type="text" name="nama_mapel" placeholder="nama mata pelajaran" class="form-control">
											</div>

																						
											<div class="form-group">
												<label class="col-form-label">Keterangan</label>
												<select class="form-control" name="keterangan" id="">
                                                    <option value="Wajib">Wajib</option>
                                                    <option value="Tambahan">Tambahan</option>
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