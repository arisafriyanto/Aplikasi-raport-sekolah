<?php


require_once __DIR__ . '/vendor/autoload.php';
require '../functions.php';

$sql = tampil("select * from mapel ");

$mpdf = new \Mpdf\Mpdf();

    $html = '
    
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Data Pelajaran</title>
            </head>
            <body>

                <img style="float: left;" width="100" src="../assets/img/bisma.jfif">
                                

                <h4 style="text-align: center;">
                    YAYASAN BINA ISLAM MANDIRI<br>
                    SMK BINA ISLAM MANDIRI KERSANA (BISMA)<br>
                    Jl. Raya Desa Limbangan, Kersana, Brebes 52264<br>
                </h4><hr><br><br>


                <table width="100%" border="1" cellspacing="0" cellpadding="8" >
                    <tr style="text-align: center;">
                        <th>No</th>
                        <th>Kode Pelajaran</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>Keterangan</th>
                    </tr>';

                    $no = 1;
                    foreach ($sql as $data) {

                        $html .=    '
                        
                                        <tr>
                                            <td style="text-align: center;">'.$no++.'</td>
                                            <td style="text-align: center;">'.$data["kode_pelajaran"].'</td>
                                            <td style="text-align: center;">'.$data["nama_mapel"].'</td>
                                            <td style="text-align: center;">'.$data["keterangan"].'</td>
                                        </tr>

                        
                                    ';

                    }


    $html .='   </table>
            </body>
            </html>
    
            ';

$mpdf ->WriteHTML($html);
$mpdf ->Output('data-pelajaran.pdf', 'D');