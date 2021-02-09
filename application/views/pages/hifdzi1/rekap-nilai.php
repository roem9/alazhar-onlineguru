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
                <th colspan="10">Nilai</th>
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

                <th>Absen 10%</th>
                <th>Hafalan 20%</th>
                <th>Tugas Harian 5%</th>
                <th>Tugas Tambahan 5%</th>
                <th>Ujian Mingguan 10%</th>
                <th>Ujian Lisan 15%</th>
                <th>Ujian Tengah Periode 15%</th>
                <th>Ujian Akhir + video 20%</th>
                <th>Total</th>
                <th>Index</th>
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
                        <?php 
                            $harian = 0;
                            for ($j=1; $j < 25; $j++) :?>
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

                    <!-- nilai harian hafalan  -->
                        <?php 
                            $hafalan = 0;
                            for ($j=1; $j < 25; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['nilai_hafalan'])) :?>
                                    <?php 
                                        $key = array_search("Pertemuan ".$j, array_column($peserta['nilai_hafalan'], "pertemuan"));
                                        $hafalan += $peserta['nilai_hafalan'][$key]['nilai'];
                                    ?>
                                    <center><?= $peserta['nilai_hafalan'][$key]['nilai']?></center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- nilai harian hafalan  -->
                    
                    <!-- nilai harian tambahan  -->
                        <?php 
                            $tambahan = 0;
                            for ($j=1; $j < 25; $j++) :?>
                            <td>
                                <?php if(in_array_r("Pertemuan ".$j , $peserta['nilai_tambahan'])) :?>
                                    <?php 
                                        $key = array_search("Pertemuan ".$j, array_column($peserta['nilai_tambahan'], "pertemuan"));
                                        $tambahan += $peserta['nilai_tambahan'][$key]['nilai'];
                                    ?>
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

                    <td><center><?= (($hadir / 24) * 0.1)?></center></td>
                    <td><center><?= (($hafalan / 24) * 0.2)?></center></td>
                    <td><center><?= (($harian / 24) * 0.05)?></center></td>
                    <td><center><?= (($tambahan / 24) * 0.05)?></center></td>
                    <td><center><?= ((($peserta['ujian'][0] + $peserta['ujian'][2] + $peserta['ujian'][5] + $peserta['ujian'][7]) / 4) * 0.1)?></center></td>
                    <td><center><?= ((($peserta['ujian'][1] + $peserta['ujian'][3] + $peserta['ujian'][6]) / 3) * 0.15)?></center></td>
                    <td><center><?= ($peserta['ujian'][4] * 0.15)?></center></td>
                    <td><center><?= ((($peserta['ujian'][8] + $peserta['ujian'][9]) / 2) * 0.2)?></center></td>
                    <td>
                        <center>
                            <?php 
                            
                                // $nilai = (($hadir / 24) * 0.1) + (($hafalan / 24) * 0.2) + (($harian / 24) * 0.05) + (($tambahan / 24) * 0.05) + ((($peserta['ujian'][0] + $peserta['ujian'][2] + $peserta['ujian'][5] + $peserta['ujian'][7]) / 4) * 0.1) + ((($peserta['ujian'][1] + $peserta['ujian'][3] + $peserta['ujian'][6]) / 3) * 0.15) + ($peserta['ujian'][4] * 0.15) + ((($peserta['ujian'][8] + $peserta['ujian'][9]) / 2) * 0.2);
                                $nilai = (($hadir / 24) * 0.1) + (($hafalan / 24) * 0.2) + (($harian / 24) * 0.05) + (($tambahan / 24) * 0.05) + ((($peserta['ujian'][0] + $peserta['ujian'][2] + $peserta['ujian'][5] + $peserta['ujian'][7]) / 4) * 0.1) + ((($peserta['ujian'][1] + $peserta['ujian'][3] + $peserta['ujian'][6]) / 3) * 0.15) + ($peserta['ujian'][4] * 0.15) + ((($peserta['ujian'][8] + $peserta['ujian'][9]) / 2) * 0.2);

                                // $nilai = (($hadir / 24) * 0.1) + (($hafalan / 24) * 0.2);
                            
                                echo $nilai;
                            ?>
                        </center>
                    </td>
                    <td>
                        <center>
                            <?php
                                if($nilai >= 86 && $nilai <= 100) $nilai = "ممتاز";
                                else if($nilai >= 71 && $nilai < 86) $nilai = "جيد جدا";
                                else if($nilai >= 56 && $nilai < 71) $nilai = "جيد";
                                else if($nilai >= 41 && $nilai < 56) $nilai = "ناقص";
                                else if($nilai >= 0 && $nilai < 41) $nilai = "فاشل";

                                echo $nilai;
                            ?>
                        </center>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>