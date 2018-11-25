<?php 
    $rating = [
        'Sangat Buruk'  => 1,
        'Buruk'         => 2,
        'Cukup'         => 3,
        'Baik'          => 4,
        'Sangat Baik'   => 5
    ];

    $tblRiil = [
        [0.75, 2000, 18, 50, 500],
        [0.5, 1500, 20, 40, 450],
        [0.9, 2050, 35, 35, 800]
    ];

    $tblRating = [
        [4,4,5,3,3],
        [3,3,4,2,3],
        [5,4,2,2,2]
    ];

    $w1 = [5,3,4,4,2];        

    $n_kriteria = count($w1);
    $n_alternatif = count($tblRiil);    

    for ($i=0; $i < $n_kriteria; $i++) {         
        $w[$i] = $w1[$i] / array_sum($w1);
        if ($i == 0 || $i == 2 || $i == 4) {
            $w[$i] = -$w[$i];
        }
    }
    
    $s = [1, 1, 1];

    for ($i=0; $i < $n_alternatif; $i++) { 
        for ($j=0; $j < $n_kriteria; $j++) {                         
            $s[$i] *= pow($tblRiil[$i][$j], $w[$j]);
        }
    }       
    
    for ($i=0; $i < $n_alternatif; $i++) { 
        $v[$i] = $s[$i] / array_sum($s);
    }
    
    print_r($w);
    print_r($s);
    print_r($v);    

    arsort($v);

    echo 'Jadi, pilih Alternatif A' . array_keys($v)[0] ;
    
?>