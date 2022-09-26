<?php 
    require "../../../functions.php";
    $guru = $_GET['guru'];

?>

    <table class="table table-striped">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Nip</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Alamat</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Telepon</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>


        <?php 

            $no = 1;


            $result = tampil("select * from guru
                                where
                                kode_guru like '%$guru%' OR
                                nip like '%$guru%' OR
                                nama_guru like '%$guru%' OR
                                alamat like '%$guru%' OR
                                telepon like '%$guru%' ");

            foreach($result as $data) {
            
                @$jk = ($data['jenis_kelamin'] == L)?"Laki - laki":"Perempuan";
        
        ?>


            <tr>
                <th scope="row" style="text-align: center;"><?= $no++; ?></th>
                <td style="text-align: center;"><?= $data['nip']; ?></td>
                <td style="text-align: center;"><?= $data['nama_guru']; ?></td>
                <td style="text-align: center;"><?= $data['alamat']; ?></td>
                <td style="text-align: center;"><?= $jk; ?></td>
                <td style="text-align: center;"><?= $data['telepon']; ?></td>
                <td style="text-align: center;">
                    <div class="m-r-10">
                        <img src="../../assets/img/guru/<?php echo $data['foto_guru'] ?>" alt="user" class="rounded" width="50">
                    </div>
                </td>
                <td style="text-align: center;">
                    <a href="?page=guru&action=update&id_guru=<?=$data['id_guru'];?>" class="btn btn-rounded btn-info btn-sm">
                        <i class="fas fa-edit "> Update</i>
                    </a> ||
                    <a onclick="return confirm('Yakin Ingin Menghapus Data??')" href="?page=guru&action=delete&id_guru=<?=$data['id_guru'];?>" class="btn btn-rounded btn-danger btn-sm">
                        <i class="fas fa-trash-alt"> Delete</i>
                    </a>
                </td>
            </tr>
            

        <?php 
        
            }
        
        ?>


        </tbody>
    </table>