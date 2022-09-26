<?php

require_once __DIR__ . '/vendor/autoload.php';
require '../functions.php';

$result = tampil("select * from kelas order by kode_kelas asc ");

$mpdf = new \Mpdf\Mpdf();


    $html = '
    
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Data Kelas</title>
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
                        <th>Nama Walikelas</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                    </tr>';

                    $no = 1;
                    foreach($result as $data) {
                        $html .=    '
                        
                                        <tr>
                                            <td style="text-align: center;">'.$no++.'</td>
                                            <td style="text-align: center;">'.$data["nama_walikelas"].'</td>
                                            <td style="text-align: center;">'.$data["nama_kelas"] . $data["kelas"].'</td>
                                            <td style="text-align: center;">'.$data["tahun_ajaran"].'</td>
                                        </tr>
                        
                                    ';
                    }


    $html .='   </table>
            </body>
            </html>
    
            ';


$mpdf->WriteHTML($html);
$mpdf->Output('data-kelas.pdf', 'D');