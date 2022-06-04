<?php
include_once 'template.php';

if (isset($_POST['submit'])) {
    for ($a = 0; $a <= 2; $a++) {
        $v_min[$a] = $_POST['v_min' . $a];
        $v_max[$a] = $_POST['v_max' . $a];
    }
    for ($b = 0; $b <= 1; $b++) {
        $nilai[$b] = $_POST['nilai' . $b];
    }

    for ($c = 0; $c <= 3; $c++) {
        $pmtrule[$c] = $_POST['pmtrule' . $c];
        $oprule[$c] = $_POST['oprule' . $c];
        $psdrule[$c] = $_POST['psdrule' . $c];
        $pdkrule[$c] = $_POST['pdkrule' . $c];
    }

    // Cek apakah variabel kosong?
    for ($i = 0; $i <= 2; $i++) {
        if ($v_min[$i] == null) {
            exit;
        }
        if ($v_max[$i] == null) {
            exit;
        }
    }

    // Cek apakah Ditanyakan kosong ?
    for ($i = 0; $i <= 1; $i++) {
        if ($nilai[$i] == null) {
            exit;
        }
    }

    // Pengecekan fungsi keanggotaan 
    for ($i = 0; $i <= 1; $i++) {
        if ($nilai[$i] <= $v_min[$i]) {
            $K[$i][0] = 1;
        } else if ($nilai[$i] >= $v_min[$i] && $nilai[$i] <= $v_max[$i]) {
            $K[$i][0] = ($v_max[$i] - $nilai[$i]) / ($v_max[$i] - $v_min[$i]);
        } else if ($nilai[$i] >= $v_max[$i]) {
            $K[$i][0] = 0;
        }

        if ($nilai[$i] <= $v_min[$i]) {
            $K[$i][1] = 0;
        } else if ($nilai[$i] >= $v_min[$i] && $nilai[$i] <= $v_max[$i]) {
            $K[$i][1] = ($nilai[$i] - $v_min[$i]) / ($v_max[$i] - $v_min[$i]);
        } else if ($nilai[$i] >= $v_max[$i]) {
            $K[$i][1] = 1;
        }
    }
    cetakKeanggotaan($K);

    // Pengecekan Rule
    $JumZ = 0;
    $jumRule = 0;
    for ($i = 0; $i <= 3; $i++) {
        switch ($oprule[$i]) {
            case 0:
                if ($K[0][$pmtrule[$i]] >= $K[1][$psdrule[$i]]) {
                    $rule[$i] = $K[1][$psdrule[$i]];
                } else {
                    $rule[$i] = $K[0][$pmtrule[$i]];
                }
                break;
            case 1:
                if ($K[0][$pmtrule[$i]] <= $K[1][$psdrule[$i]]) {
                    $rule[$i] = $K[1][$psdrule[$i]];
                } else {
                    $rule[$i] = $K[0][$pmtrule[$i]];
                }
                break;
        }

        $jumRule += $rule[$i];

        switch ($pdkrule[$i]) {
            case 0:
                $nilZ[$i] = ($v_max[2] - ($rule[$i] * ($v_max[2] - $v_min[2])));
                break;
            case 1:
                $nilZ[$i] = (($rule[$i] * ($v_max[2] - $v_min[2])) + $v_min[2]);
                break;
        }
        $JumZ = ($JumZ + ($rule[$i] * $nilZ[$i]));
    }

    cetakHasilRule($nilZ, $rule);

    $hasil = $JumZ / $jumRule;
    cetakHasil(round($hasil));
}
