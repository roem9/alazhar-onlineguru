<?php
    function in_array_r($item , $array){
        return preg_match('/"'.preg_quote($item, '/').'"/i' , json_encode($array));
    }

    function nilai_harian($nilai, $pertemuan){
        switch ($pertemuan) {
            case 1:
                $nilai_harian = $nilai * 0.05;
                break;
            case 2:
                $nilai_harian = $nilai * 0.06;
                break;
            case 3:
                $nilai_harian = $nilai * 0.04;
                break;
            case 4:
                $nilai_harian = $nilai * 0.05;
                break;
            case 5:
                $nilai_harian = $nilai * 0.07;
                break;
            case 6:
                $nilai_harian = $nilai * 0.04;
                break;
            case 8:
                $nilai_harian = $nilai * 0.08;
                break;
            case 9:
                $nilai_harian = $nilai * 0.05;
                break;
            case 10:
                $nilai_harian = $nilai * 0.08;
                break;
            case 11:
                $nilai_harian = $nilai * 0.04;
                break;
            case 12:
                $nilai_harian = $nilai * 0.04;
                break;
            case 13:
                $nilai_harian = $nilai * 0.08;
                break;
            case 14:
                $nilai_harian = $nilai * 0.06;
                break;
            case 15:
                $nilai_harian = $nilai * 0.04;
                break;
            case 16:
                $nilai_harian = $nilai * 0.04;
                break;
            case 17:
                $nilai_harian = $nilai * 0.04;
                break;
            case 18:
                $nilai_harian = $nilai * 0.05;
                break;
            case 19:
                $nilai_harian = $nilai * 0.04;
                break;
            case 20:
                $nilai_harian = $nilai * 0.05;
                break;
            default:
                # code...
                break;
        }

        return $nilai_harian;
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
                                        $harian += nilai_harian($peserta['nilai_harian'][$key]['nilai'], $j);
                                    ?>
                                    <center><?= $peserta['nilai_harian'][$key]['nilai']?></center>
                                <?php else :?>
                                    <center>-</center>
                                <?php endif;?>
                            </td>
                        <?php endfor;?>
                    <!-- nilai harian form  -->
                    
                    <?php 
                        $nilai_review = 0;
                        foreach ($peserta['review'] as $review) :
                        $nilai_review += $review;
                    ?>
                        <td><center><?= $review?></center></td>
                    <?php endforeach;?>

                    <?php
                        // $hadir = $hadir/20 * 0.2;
                        // $harian = $harian/19 * 0.65;
                        // $nilai_review = $nilai_review/4 * 0.15;
                        $hadir = $hadir;
                        $harian = $harian * 0.65;
                        $nilai_review = $nilai_review/4 *0.15;

                        $total = $hadir + $harian + $nilai_review;
                        
                    ?>
                    <td>
                        <center>
                        <?php
                            if($total >= 86 && $total <= 100) $total = "ممتاز";
                            else if($total >= 71 && $total < 86) $total = "جيد جدا";
                            else if($total >= 56 && $total < 71) $total = "جيد";
                            else if($total >= 41 && $total < 56) $total = "ناقص";
                            else if($total >= 0 && $total < 41) $total = "فاشل";

                            echo $total;
                        ?>
                        </center>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>