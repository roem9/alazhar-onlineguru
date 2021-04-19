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
                <th colspan="20">Absen</th>
                <th rowspan="2">Hadir</th>
                <th colspan="20">Latihan Harian</th>
                <th rowspan="2">Review Pekan 1</th>
                <th rowspan="2">Review Pekan 2</th>
                <th rowspan="2">Review Pekan 3</th>
                <th rowspan="2">Review Pekan 4</th>
                <th rowspan="2">Nilai</th>
            </tr>
            <tr>
                <?php for ($i=1; $i < 21; $i++) :?>
                    <th><center><?= $i?></center></th>
                <?php endfor;?>
                
                <?php for ($i=1; $i < 21; $i++) :?>
                    <th><center><?= $i?></center></th>
                <?php endfor;?>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($peserta as $i => $peserta) :?>
                <?php $nilai = 0;?>
                <tr>
                    <td><center><?= $i+1?></center></td>
                    <td><?= $peserta['data']['nama']?></td>

                    <!-- absen  -->
                        <?php 
                            $hadir = 0;
                            for ($j=1; $j < 21; $j++) :?>
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
                        <?php 
                            $harian = 0;
                            for ($j=1; $j < 21; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['nilai_harian'])) :?>
                                    <?php 
                                        $key = array_search("Pertemuan ".$j, array_column($peserta['nilai_harian'], "pertemuan"));
                                        $harian += $peserta['nilai_harian'][$key]['nilai'];
                                    ?>
                                    <center><?= $peserta['nilai_harian'][$key]['nilai']?></center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- nilai harian form  -->
                    
                    <?php foreach ($peserta['review'] as $review) :?>
                        <td><center><?= $review?></center></td>
                    <?php endforeach;?>

                    <td>
                        <center>
                            Nilai 
                        </center>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>