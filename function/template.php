<?php
function cetakKeanggotaan($K)
{
    $a = array("Permintaan Turun", "Permintaan Naik", "Persediaan Sedikit", "Persediaan Banyak");
    $c = 0;

    echo '
    <div class="row justify-content-center">                        
    <div class="col-lg-3">
    <div class="card shadow-sm">
        <h5 class="card-header bg-success text-white">Fungsi Keanggotaan</h5>
        <div class="card-body">
            <table class="table table-borderless">';

    for ($i = 0; $i <= 1; $i++) {
        for ($j = 0; $j <= 1; $j++) {
            echo "<tr><td>" . $a[$c] . "</td><td><strong>" . $K[$i][$j] . "</strong></td></tr>";
            $c++;
        }
    }
    echo '
    </table>
</div>
</div>
</div>';
}

function cetakHasilRule($nilZ, $rule)
{

    echo '                        
    <div class="col-lg-4">
    <div class="card shadow-sm">
        <h5 class="card-header bg-success text-white">Hasil dari Rule</h5>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nilai Rule</th>
                    <th scope="col">Nilai Z</th>
                </tr>';

    for ($i = 0; $i <= 3; $i++) {
        $b = $i + 1;
        echo        '
                <tr>
                    <td>' . $b . '</td>
                    <td>' . $rule[$i] . '</td>
                    <td>' . $nilZ[$i] . '</td>
                </tr>
                ';
    }
    echo '
            </table>
        </div>
    </div>
</div>
</div>
';
}

function cetakHasil($hasil)
{
    echo '                    
    <div class="my-3 row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body row justify-content-around">
                <span class="col-8">Hasil Akhir</span> <span class="fw-bold text-success col-4">' . $hasil . '</span>
            </div>
        </div>
    </div>
</div>';
}
