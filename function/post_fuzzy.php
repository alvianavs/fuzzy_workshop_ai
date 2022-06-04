<?php
function getData()
{
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
    }
}
