<?php
    function in_array_r($item , $array){
        return preg_match('/"'.preg_quote($item, '/').'"/i' , json_encode($array));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border=1>
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th colspan="24">Absen</th>
                <th rowspan="2">Hadir</th>
                <th colspan="24">Latihan Form</th>
                <th colspan="24">Latihan Hafalan</th>
                <th colspan="24">Latihan Tambahan</th>
                <th colspan="2">Ujian Pekan 1</th>
                <th colspan="2">Ujian Pekan 2</th>
                <th rowspan="2">Ujian Pertengahan</th>
                <th colspan="2">Ujian Pekan 3</th>
                <th rowspan="2">Ujian Form Pekan 4</th>
                <th colspan="2">Ujian Akhir</th>
                <th rowspan="2">Nilai</th>
            </tr>
            <tr>
                <?php for ($i=1; $i < 25; $i++) :?>
                    <th><center><?= $i?></center></th>
                <?php endfor;?>
                
                <?php for ($i=1; $i < 25; $i++) :?>
                    <th><center><?= $i?></center></th>
                <?php endfor;?>
                
                <?php for ($i=1; $i < 25; $i++) :?>
                    <th><center><?= $i?></center></th>
                <?php endfor;?>
                
                <?php for ($i=1; $i < 25; $i++) :?>
                    <th><center><?= $i?></center></th>
                <?php endfor;?>
                
                <th>Form</th>
                <th>Lisan</th>
                
                <th>Form</th>
                <th>Lisan</th>

                <th>Form</th>
                <th>Lisan</th>

                <th>Form</th>
                <th>Video</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($peserta as $i => $peserta) :?>
                <tr>
                    <td><center><?= $i+1?></center></td>
                    <td><?= $peserta['data']['nama']?></td>

                    <!-- absen  -->
                        <?php 
                            $hadir = 0;
                            for ($j=1; $j < 25; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['absen'])) :
                                    $hadir ++;    
                                ?>
                                    <center>o</center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- absen  -->

                    <td><center><?= $hadir?></center></td>
                    
                    <!-- nilai harian form  -->
                        <?php for ($j=1; $j < 25; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['nilai_harian'])) :?>
                                    <?php $key = array_search("Pertemuan ".$j, array_column($peserta['nilai_harian'], "pertemuan"));?>
                                    <center><?= $peserta['nilai_harian'][$key]['nilai']?></center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- nilai harian form  -->

                    <!-- nilai harian hafalan  -->
                        <?php for ($j=1; $j < 25; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['nilai_hafalan'])) :?>
                                    <?php $key = array_search("Pertemuan ".$j, array_column($peserta['nilai_hafalan'], "pertemuan"));?>
                                    <center><?= $peserta['nilai_hafalan'][$key]['nilai']?></center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- nilai harian hafalan  -->
                    
                    <!-- nilai harian tambahan  -->
                        <?php for ($j=1; $j < 25; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['nilai_tambahan'])) :?>
                                    <?php $key = array_search("Pertemuan ".$j, array_column($peserta['nilai_tambahan'], "pertemuan"));?>
                                    <center><?= $peserta['nilai_tambahan'][$key]['nilai']?></center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- nilai harian tambahan  -->
                    
                    <?php foreach ($peserta['ujian'] as $ujian) :?>
                        <td><center><?= $ujian?></center></td>
                    <?php endforeach;?>

                    <td></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>