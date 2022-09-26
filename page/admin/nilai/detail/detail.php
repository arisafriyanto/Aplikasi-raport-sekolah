<?php 

    $nama_siswa = $_GET['nama_siswa'];

?>



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
							<h2 class="pageheader-title">Nilai Siswa</h2><hr>

					<div class="row">
								
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">


								<table class="table table-striped">
									<thead>
										<tr style="text-align: center;">
											<th scope="col">No</th>
											<th scope="col">Semester</th>
											<th scope="col">Pelajaran</th>
											<th scope="col">Nilai Tugas 1</th>
											<th scope="col">Nilai Tugas 2</th>
											<th scope="col">Nilai Tugas 3</th>
											<th scope="col">Nilai Uts</th>
											<th scope="col">Nilai Uas</th>
											<th scope="col">Keterangan</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>

									<tbody>


									<?php 

										$no = 1;
										$result = tampil("select * from nilai where nama_siswa='$nama_siswa' ");
										
										foreach($result as $data) {

									
									?>

											<tr>
												<td style="text-align: center;"><?= $no++; ?></td>
												<td style="text-align: center;"><?=$data['semester']?></td>
												<td style="text-align: center;"><?=$data['pelajaran']?></td>
												<td style="text-align: center;"><?=$data['nilai_tugas_1']?></td>
												<td style="text-align: center;"><?=$data['nilai_tugas_2']?></td>
												<td style="text-align: center;"><?=$data['nilai_tugas_3']?></td>
												<td style="text-align: center;"><?=$data['nilai_uts']?></td>
												<td style="text-align: center;"><?=$data['nilai_uas']?></td>
												<td style="text-align: center;"><?=$data['keterangan']?></td>
												<td style="text-align: center;">
													<a href="?page=nilai&action=update&id_nilai=<?=$data['id_nilai'];?>" 
														class="btn btn-rounded btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Update">
														<i class="fas fa-sync"></i>
													</a>
													<a href="?page=nilai&action=delete&id_nilai=<?=$data['id_nilai'];?>" 
														class="btn btn-rounded btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete">
														<i class="fas fa-trash-alt"></i>
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

</body>
</html>