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
							<h2 class="pageheader-title">Mata Pelajaran</h2><hr>

					<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<h5 class="card-header">
								<a href="?page=matapelajaran&action=insert" class="btn btn-rounded btn-primary btn-sm">
									<i class="fas fa-plus-circle"> Tambah Data</i>
								</a>
								

								<div style="float: right; padding-top: 10px" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
									<form action="" method="post">

										<input class="form-control" type="text" name="cari_mapel" placeholder="Search.." id="cari_mapel">

									</form>
								</div>
								
							
								</h5>
								
								
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="card">
									<div class="card-body">
										<div class="table-responsive">


								<div id="tabel_mapel">
								<table class="table table-striped">
									<thead>
                                        <tr style="text-align: center;">
											<th scope="col">No</th>
											<th scope="col">Kode Pelajaran</th>
											<th scope="col">Nama Mata Pelajaran</th>
											<th scope="col">Keterangan</th>
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




                                        $sql = tampil("select * from mapel order by kode_pelajaran asc limit $start, $perpage ");
										$no = $start + 1;

                                        foreach ($sql as $data) {
                                    
                                    ?>

                                    <tr>
										<th scope="row" style="text-align: center;"><?= $no++; ?></th>
                                        <td style="text-align: center"><?=$data['kode_pelajaran'];?></td>
                                        <td style="text-align: center"><?=$data['nama_mapel'];?></td>
                                        <td style="text-align: center"><?=$data['keterangan'];?></td>
                                        <td style="text-align: center;">
                                            <a href="?page=matapelajaran&action=update&id_mapel=<?=$data['id_mapel'];?>" class="btn btn-rounded btn-secondary btn-sm">
                                                <i class="fas fa-edit "> Update</i>
                                            </a> ||
                                            <a href="?page=matapelajaran&action=delete&id_mapel=<?=$data['id_mapel'];?>" class="btn btn-rounded btn-info btn-sm">
                                                <i class="fas fa-trash-alt"> Delete</i>
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
									
										$sql = mysqli_query($conn, "select * from mapel ");

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
															echo "<li class='page-item'><a class='page-link' href='?page=matapelajaran&hal=$link'>&laquo; Previous</a></li>";
				
														}else{
				
															echo "<li class='page-item'><a class='page-link' href=''>&laquo; Previous</a></li>";
				
														}

														
													
														for ($i=1; $i <=$halaman ; $i++) { 
															if($i != $page) {
															echo "<li class='page-item'><a class='page-link' href='?page=matapelajaran&hal=$i' >$i</a></li>";
															}else{
																echo "<li class='page-item active'><a class='page-link' href='?page=matapelajaran&hal=$i' >$i</a></li>";
															}
														}



														if($page < $halaman) {
															$link = $page + 1;
															echo "<li class='page-item'><a class='page-link' href='?page=matapelajaran&hal=$link'>Next &raquo;</a></li>";
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