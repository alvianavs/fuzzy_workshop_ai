<?php
// mulai
for ($i = 0; $i <= 2; $i++) {
    if ($vMin[$i] == null) {exit;}
    if ($vMax[$i] == null) {exit;}
}

for ($i = 0; $i <= 1; $i++) {
    if ($nil[$i] == null) {exit;}
}

for ($i = 0; $i <= 1; $i++) {
    if ($nil[$i] <= $vMin[$i]) {
        $K[$i][0] = 1;
    } else if ($nil[$i] >= $vMin[$i] && $nil[$i] <= $vMax[$i]) {
        $K[$i][0] = ($vMax[$i] - $nil[$i]) / ($vMax[$i] - $vMin[$i]);
    } else if ($nil[$i] >= $vMax[$i]) {
        $K[$i][0] = 0;
    }

    if ($nil[$i] <= $vMin[$i]) {
        $K[$i][1] = 0;
    } else if ($nil[$i] >= $vMin[$i] && $nil[$i] <= $vMax[$i]) {
        $K[$i][1] = ($nil[$i] - $vMin[$i]) / ($vMax[$i] - $vMin[$i]);
    } else if ($nil[$i] >= $vMax[$i]) {
        $K[$i][1] = 1;
    }

}
// if($_POST['submit']) {
//     print_r($_POST);
//     die;
// }

$a = array("Permintaan Turun", "Permintaan Naik", "Persediaan Sedikit", "Persediaan Banyak");
$c = 0;
$JumZ = 0;
$jumRule = 0;
echo "<table border='1px solid' cellpadding='1' cellspacing='1'>
        <tr><td colspan='2' style='text-align:center;'><b>FUNGSI KEANGGOTAAN</b></td></tr>";
for ($i = 0; $i <= 1; $i++) {
    for ($j = 0; $j <= 1; $j++) {
        echo "<tr><td>" . $a[$c] . "</td><td>" . $K[$i][$j] . "</td></tr>";
        $c++;
    }
    // print_r($K[$i]);
    // echo "<br>";
}
echo "</table><br/><br/>";
for ($i = 0; $i <= 3; $i++) {
    // print_r($K[1][$rlyn[$i]]);
    // echo "<br>";
    switch ($rop[$i]) {
        case 0:
            if ($K[0][$rbyr[$i]] >= $K[1][$rlyn[$i]]) {
                $rule[$i] = $K[1][$rlyn[$i]];
            } else {
                $rule[$i] = $K[0][$rbyr[$i]];
            }
            break;
        case 1:
            if ($K[0][$rbyr[$i]] <= $K[1][$rlyn[$i]]) {
                $rule[$i] = $K[1][$rlyn[$i]];
            } else {
                $rule[$i] = $K[0][$rbyr[$i]];
            }
            break;
    }
    print_r($rule[$i]);
    echo "<br>";

    $jumRule += $rule[$i];

    switch ($rtip[$i]) {
        case 0:
            $nilZ[$i] = ($vMax[2] - ($rule[$i] * ($vMax[2] - $vMin[2])));
            break;
        case 1:
            $nilZ[$i] = (($rule[$i] * ($vMax[2] - $vMin[2])) + $vMin[2]);
            break;
    }
    $JumZ = ($JumZ + ($rule[$i] * $nilZ[$i]));
}
print_r($jumRule);
echo "<br>";

echo "<table border='1px solid' cellpadding='1' cellspacing='1'>
        <tr><td colspan='5' style='text-align:center;'><b>HASIL DARI RULE</b></td></tr>";
for ($i = 0; $i <= 3; $i++) {
    $b = $i + 1;
    echo "<tr><td>Nilai Rule " . $b . "</td><td>" . $rule[$i] . "</td><td> -->> </td><td>Nilai Z " . $b . "</td><td>" . $nilZ[$i] . "</td></tr>";
}
echo "</table><br/><br/>";
$hasil = $JumZ / $jumRule;
echo "<span style='font-size:xx-large;'><b>Produksi " . round($hasil) . ",-</b></span>";
