<?php 
    require "../../../functions.php";
    $kelas = $_GET['kelas'];

?>

    <table class="table table-striped">
        <thead>
            <tr style="text-align: center;">
                <th scope="col">No</th>
                <th scope="col">Kode Kelas</th>
                <th scope="col">Nama Walikelas</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>


        <?php 


            $no = 1;

            $result = tampil("select * from kelas
                                where
                               kode_kelas like '%$kelas%' OR
                               nama_walikelas like '%$kelas%' OR
                               nama_kelas like '%$kelas%' OR
                               kelas like '%$kelas%' OR
                               tahun_ajaran like '%$kelas%' ");
            
            foreach($result as $data) {

        
        ?>

                <tr>
                    <th scope="row" style="text-align: center;"><?= $no++; ?></th>
                    <td style="text-align: center;"><?= $data['kode_kelas']; ?></td>
                    <td style="text-align: center;"><?= $data['nama_walikelas']; ?></td>
                    <td style="text-align: center;"><?= $data['tahun_ajaran']; ?></td>
                    <td style="text-align: center;"><?= $data['nama_kelas'] . $data['kelas']; ?></td>
                    <td style="text-align: center;"><?= $data['status']; ?></td>
                    <td style="text-align: center;">
                        <a href="?page=kelas&action=update&id_kelas=<?=$data['id_kelas'];?>" class="btn btn-rounded btn-success btn-sm">
                            <i class="fas fa-edit "> Update</i>
                        </a> ||
                        <a href="?page=kelas&action=delete&id_kelas=<?=$data['id_kelas'];?>" class="btn btn-rounded btn-brand btn-sm">
                            <i class="fas fa-trash-alt"> Delete</i>
                        </a>
                    </td>
                </tr>

        <?php 

            }
        
        
        ?>

        </tbody>
        </table>