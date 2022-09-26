<?php 
    require "../../../functions.php";
    $nilai = $_GET['nilai'];

?>


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

										$result = tampil("select * from kelas_siswa 
                                                                where
                                                            kode_data_siswa like '%$nilai%' OR
                                                            nis like '%$nilai%' OR
                                                            nama_siswa like '%$nilai%' OR
                                                            walikelas like '%$nilai%' OR
                                                            jurusan like '%$nilai%' OR
                                                            nama_kelas like '%$nilai%' OR
                                                            kelas like '%$nilai%' OR
                                                            tahun_ajaran like '%$nilai%'  ");
										
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
													<a href="?page=nilai&action=detail&nama_siswa=<?=$data['nama_siswa'];?>" class="btn btn-rounded btn-info btn-sm">
														<i class="fas fa-search-plus"> Detail</i>
													</a>
												</td>
											</tr>

									<?php 

										}
									
									?>

									</tbody>
									</table>