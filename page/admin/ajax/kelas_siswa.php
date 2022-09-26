<?php 
    require "../../../functions.php";
    $kelas_siswa = $_GET['kelas_siswa'];

?>


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
			
			$result = tampil("select * from kelas_siswa 
								where
							kode_data_siswa like '%$kelas_siswa%' OR
							nis like '%$kelas_siswa%' OR
							nama_siswa like '%$kelas_siswa%' OR
							walikelas like '%$kelas_siswa%' OR
							jurusan like '%$kelas_siswa%' OR
							nama_kelas like '%$kelas_siswa%' OR
							kelas like '%$kelas_siswa%' OR
							tahun_ajaran like '%$kelas_siswa%' ");
			
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