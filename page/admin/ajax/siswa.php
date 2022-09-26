<?php 
    require "../../../functions.php";
    $cari = $_GET['keyword'];

?>

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
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>


        <?php 

            $no = 1;


            $result = tampil("select * from siswa
                                 where
                                 nis like '%$cari%' OR
                                 nama_siswa like '%$cari%' OR
                                 agama like '%$cari%' OR
                                 alamat like '%$cari%' OR
                                 tempat_lahir like '%$cari%' OR
                                 telepon like '%$cari%' OR
                                 tahun_angkatan like '%$cari%' ");
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
                <td style="text-align: center;">
                    <a href="?page=siswa&action=update&id_siswa=<?=$data['id_siswa'];?>" class="btn btn-rounded btn-brand btn-sm">
                        <i class="fas fa-edit "> Update</i>
                    </a> ||
                    <a onclick="return confirm('Yakin Ingin Menghapus Data??')" href="?page=siswa&action=delete&id_siswa=<?=$data['id_siswa'];?>" class="btn btn-rounded btn-danger btn-sm">
                        <i class="fas fa-trash-alt"> Delete</i>
                    </a>
                </td>
            </tr>          

        <?php 
        
            }
        
        ?>

        </tbody>
        </table>