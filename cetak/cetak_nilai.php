<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../functions.php';

$nama_siswa = $_GET['nama_siswa'];

$result = tampil("select * from nilai where nama_siswa='$nama_siswa' ");

$mpdf = new \Mpdf\Mpdf();


    $html = '
    
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Data Nilai</title>
            </head>
            <body>

                <img style="float: left;" width="100" src="../assets/img/bisma.jfif">
                                

                <h4 style="text-align: center;">
                    YAYASAN BINA ISLAM MANDIRI<br>
                    SMK BINA ISLAM MANDIRI KERSANA (BISMA)<br>
                Jl. Raya Desa Limbangan, Kersana, Brebes 52264<br>
                </h4><hr><br><br>

                <table border="1" width="100%" cellspacing="0" cellpadding="5" >
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th>Nama Pelajaran</th>
                        <th>Nilai Tugas 1</th>
                        <th>Nilai Tugas 2</th>
                        <th>Nilai Tugas 3</th>
                        <th>Nilai Uts</th>
                        <th>Nilai Uas</th>
                        <th>Semester</th>
                        <th>Keterangan</th>
                    </tr>';

                    $no = 1;
                    foreach($result as $data) {
                        $html .=    '
                        
                                        <tr>
                                            <td style="text-align: center;">'.$no++.'</td>
                                            <td style="text-align: center;">'.$data["pelajaran"].'</td>
                                            <td style="text-align: center;">'.$data["nilai_tugas_1"].'</td>
                                            <td style="text-align: center;">'.$data["nilai_tugas_2"].'</td>
                                            <td style="text-align: center;">'.$data["nilai_tugas_3"].'</td>
                                            <td style="text-align: center;">'.$data["nilai_uts"].'</td>
                                            <td style="text-align: center;">'.$data["nilai_uas"].'</td>
                                            <td style="text-align: center;">'.$data["semester"].'</td>
                                            <td style="text-align: center;">'.$data["keterangan"].'</td>
                                        </tr>
                        
                                    ';
                    }


    $html .='   </table>
            </body>
            </html>
    
            ';


$mpdf->WriteHTML($html);
$mpdf->Output( $nama_siswa . '.pdf', 'D');