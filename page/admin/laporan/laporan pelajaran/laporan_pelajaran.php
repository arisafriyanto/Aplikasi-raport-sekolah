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
								<a href="../../cetak/cetak_pelajaran.php" target="_blank" class="btn btn-rounded btn-primary btn-sm">
									<i class="fas fa-print"> Cetak</i>
								</a>
							</h5>
							<div class="card-body">
								<table class="table table-striped">
									<thead>
                                        <tr style="text-align: center;">
											<th scope="col">No</th>
											<th scope="col">Kode Pelajaran</th>
											<th scope="col">Nama Mata Pelajaran</th>
											<th scope="col">Keterangan</th>
										</tr>
									</thead>

									<tbody>


									<?php 
        
                                        $no = 1;

                                        $sql = tampil("select * from mapel ");

                                        foreach ($sql as $data) {
                                    
                                    ?>

                                    <tr>
										<th scope="row" style="text-align: center;"><?= $no++; ?></th>
                                        <td style="text-align: center"><?=$data['kode_pelajaran'];?></td>
                                        <td style="text-align: center"><?=$data['nama_mapel'];?></td>
                                        <td style="text-align: center"><?=$data['keterangan'];?></td>
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

</body>
</html>