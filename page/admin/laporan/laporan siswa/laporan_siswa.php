<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Aplikasi Raport</title>
</head>
<body>


	<div class="dashboard-wrapper">
		<div class="dashboard-ecommerce">
			<div class="container-fluid dashboard-content ">
				<!-- pageheader  -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="page-header">
							<h2 class="pageheader-title">Data Siswa</h2><hr>

					<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<h5 class="card-header">
								<a href="../../cetak/cetak_siswa.php" target="_blank" class="btn btn-rounded btn-info btn-sm">
									<i class="fas fa-print"> Cetak </i>
								</a>
							</h5>
								
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">


								<table class="table table-striped">
									<thead>
										<tr style="text-align: center;">
											<th scope="col">No</th>
											<th scope="col">Nis</th>
											<th scope="col">Nama Siswa</th>
											<th scope="col">Jenis Kelamin</th>
											<th scope="col">Telepon</th>
											<th scope="col">Tanggal Lahir</th>
											<th scope="col">Foto</th>
										</tr>
									</thead>

									<tbody>


									<?php 

										$no = 1;


										$result = tampil("select * from siswa order by nama_siswa asc");

										foreach($result as $data) {

											@$jk = ($data['jenis_kelamin'] == L)?"Laki - laki":"Perempuan";

									?>



										<tr>
											<th scope="row" style="text-align: center;"><?= $no++; ?></th>
											<td style="text-align: center;"><?= $data['nis']; ?></td>
											<td style="text-align: center;"><?= $data['nama_siswa']; ?></td>
											<td style="text-align: center;"><?= $jk; ?></td>
											<td style="text-align: center;"><?= $data['telepon']; ?></td>
											<td style="text-align: center;"><?= date("d M Y", strtotime($data['tanggal_lahir'])); ?></td>
											<td style="text-align: center;">
												<div class="m-r-10">
													<img src="../../assets/img/siswa/<?php echo $data['foto_siswa'] ?>" alt="user" class="rounded" width="50">
												</div>
											</td>
										</tr>
										

									<?php 
									
										}
									
									?>

								

									</tbody>
                                    </table>
                                    
								</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			</div>
		</div>
	</div>

</body>
</html>

