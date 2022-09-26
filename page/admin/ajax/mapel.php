<?php 
    require "../../../functions.php";
    $mapel = $_GET['mapel'];

?>


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

            $sql = tampil("select * from mapel
                            where
                            kode_pelajaran like '%$mapel%' OR
                            nama_mapel like '%$mapel%' OR
                            keterangan like '%$mapel%' ");

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