<?php

require_once __DIR__ . '/vendor/autoload.php';

require '../functions.php';

$result = tampil("select * from guru order by nama_guru asc ");

$mpdf = new \Mpdf\Mpdf();


    $html = '
    
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Data Guru</title>
                </head>
                <body>

                    <img style="float: left;" width="100" src="../assets/img/bisma.jfif">
                        

                    <h4 style="text-align: center;">
                        YAYASAN BINA ISLAM MANDIRI<br>
                        SMK BINA ISLAM MANDIRI KERSANA (BISMA)<br>
                    Jl. Raya Desa Limbangan, Kersana, Brebes 52264<br>
                    </h4><hr><br><br>

                    
                    <table border="1" cellspacing="0" cellpadding="8" >
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>Nip</th>
                            <th>Nama Guru</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Telepon</th>
                            <th>Foto</th>
                        </tr>';

                        $no = 1;

                        foreach($result as $data) {

                            @$jk = ($data['jenis_kelamin'] == L)?"Laki - laki":"Perempuan";

                            $html .=   '
                                        
                                        <tr>
                                            <td>'.$no++.'</td>
                                            <td>'.$data["nip"].'</td>
                                            <td>'.$data["nama_guru"].'</td>
                                            <td>'.$data["alamat"].'</td>
                                            <td>'.$jk.'</td>
                                            <td>'.$data["telepon"].'</td>
                                            <td>
                                                <img width="50" src="../assets/img/guru/'.$data["foto_guru"].'">
                                            </td>
                                        </tr>


                                        ';

                        }

    $html .='       </table>
                </body>
                </html>

            ';

$mpdf->WriteHTML($html);
$mpdf->Output('data-guru.pdf', 'D');