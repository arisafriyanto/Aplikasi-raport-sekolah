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
							<h2 class="pageheader-title">Kelas Siswa</h2><hr>

					<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<h5 class="card-header">
								<a href="?page=kelas_siswa&action=insert" class="btn btn-rounded btn-danger btn-sm">
									<i class="fas fa-plus-circle"> Tambah Data</i>
								</a>
								

								<div style="float: right; padding-top: 10px" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
									<form action="" method="post">

										<input class="form-control" type="text" name="cari_kelas_siswa" placeholder="Search.." id="cari_kelas_siswa">

									</form>
								</div>
								
							
								</h5>
								
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">



								<div id="tabel_kelas_siswa">
								<table class="table table-striped">
									<thead>
										<tr style="text-align: center;">
											<th scope="col">No</th>
											<th scope="col">Nis</th>
											<th scope="col">Nama Siswa</th>
											<th scope="col">Jurusan</th>
											<th scope="col">Tahun Ajaran</th>
											<th scope="col">Nama Kelas</th>
											<th scope="col">Walikelas</th>
											<th scope="col">Status</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>

									<tbody>


									<?php 






										$no = 1;

										$perpage = 10;

										if(isset($_GET['hal'])) {
											$page = $_GET['hal'];
										}else{
											$page = 1;
										}

										if($page > 1) {
											$start = ($page * $perpage) - $perpage;
										}else{
											$start = 0;
										}


										$result = tampil("select * from kelas_siswa order by kode_data_siswa asc limit $start, $perpage ");
										$no = $start + 1;
										
										foreach($result as $data) {

									
									?>

											<tr>
												<th scope="row" style="text-align: center;"><?= $no++; ?></th>
												<td style="text-align: center;"><?=$data['nis']?></td>
												<td style="text-align: center;"><?=$data['nama_siswa']?></td>
												<td style="text-align: center;"><?=$data['jurusan']?></td>
												<td style="text-align: center;"><?=$data['tahun_ajaran']?></td>
												<td style="text-align: center;"><?=$data['kelas'] . $data['nama_kelas']?></td>
												<td style="text-align: center;"><?=$data['walikelas']?></td>
												<td style="text-align: center;"><?=$data['status']?></td>
												<td style="text-align: center;">
													<a href="?page=kelas_siswa&action=update&id_dk=<?=$data['id_dk'];?>" 
														class="btn btn-rounded btn-dark btn-sm" data-toggle="tooltip" data-placement="Top" title="Update">
														<i class="fas fa-sync"></i>
													</a>
													<a href="?page=kelas_siswa&action=delete&id_dk=<?=$data['id_dk'];?>" 
														class="btn btn-rounded btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete">
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

									

									





									<?php 
									
										$sql = mysqli_query($conn, "select * from kelas_siswa ");

										$jumlah = mysqli_num_rows($sql);
										$halaman = ceil($jumlah/$perpage);

									?>





										<!-- paginations  -->
                                <!-- ============================================================== -->
                                <h5 class="card-header"></h5><br>
                                            <nav aria-label="Page navigation example">
												<ul style="float: right;" class="pagination">


													<?php 
													
														if($page > 1) {

															$link = $page -1;
															echo "<li class='page-item'><a class='page-link' href='?page=kelas_siswa&hal=$link'>&laquo; Previous</a></li>";
				
														}else{
				
															echo "<li class='page-item'><a class='page-link' href=''>&laquo; Previous</a></li>";
				
														}

														
													
														for ($i=1; $i <=$halaman ; $i++) { 
															if($i != $page) {
															echo "<li class='page-item'><a class='page-link' href='?page=kelas_siswa&hal=$i' >$i</a></li>";
															}else{
																echo "<li class='page-item active'><a class='page-link' href='?page=kelas_siswa&hal=$i' >$i</a></li>";
															}
														}



														if($page < $halaman) {
															$link = $page + 1;
															echo "<li class='page-item'><a class='page-link' href='?page=kelas_siswa&hal=$link'>Next &raquo;</a></li>";
														}else{
															echo "<li class='page-item'><a class='page-link' href=''>Next &raquo;</a></li>";
														}



														
													?>
													
													
                                                </ul>

												<i>Showing <?= $start + 1 .' to '. --$no .' of '. $jumlah?> entries </i>

                                            </nav>
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