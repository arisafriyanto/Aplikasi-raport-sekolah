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
							<h2 class="pageheader-title">Data Nilai Siswa</h2><hr>

					<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								
								
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
											<th scope="col">Tahun Ajaran</th>
											<th scope="col">Nama Kelas</th>
											<th scope="col">Walikelas</th>
											<th scope="col">Detail</th>
										</tr>
									</thead>

									<tbody>


									<?php 

										$no = 1;
										$result = tampil("select * from kelas_siswa order by nama_siswa asc ");
										
										foreach($result as $data) {

									
									?>

											<tr>
												<th scope="row" style="text-align: center;"><?= $no++; ?></th>
												<td style="text-align: center;"><?=$data['nis']?></td>
												<td style="text-align: center;"><?=$data['nama_siswa']?></td>
												<td style="text-align: center;"><?=$data['tahun_ajaran']?></td>
												<td style="text-align: center;"><?=$data['kelas'] . $data['nama_kelas']?></td>
												<td style="text-align: center;"><?=$data['walikelas']?></td>
												<td style="text-align: center;">
													<a href="?page=laporannilai&action=detail&nama_siswa=<?=$data['nama_siswa'];?>" class="btn btn-rounded btn-info btn-sm">
														<i class="fas fa-search-plus"> Detail</i>
													</a>
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

</body>
</html>