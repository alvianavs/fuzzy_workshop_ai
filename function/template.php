<?php
function cetakKeanggotaan($K)
{
    $a = array("Permintaan Turun", "Permintaan Naik", "Persediaan Sedikit", "Persediaan Banyak");
    $c = 0;

    for ($i = 0; $i <= 1; $i++) {
        for ($j = 0; $j <= 1; $j++) {
            $anggota[$c] = "<tr><td>" . $a[$c] . "</td><td><strong>" . $K[$i][$j] . "</strong></td></tr>";
            $c++;
        }
    }

    $cetak = array( '
        <div class="col-lg-3">
            <div class="card shadow-sm">
                <h6 class="card-header bg-success text-white">Fungsi Keanggotaan</h6>
                <div class="card-body">
                    <table class="table table-borderless">
                    '.$anggota[0] . $anggota[1] . $anggota[2] . $anggota[3].'
                    </table>
                </div>
            </div>
        </div>'
    );
    return $cetak;
}

function cetakHasilRule($nilZ, $rule)
{
    for ($i = 0; $i <= 3; $i++) {
        $b = $i + 1;
        $tr[$i] = '<tr>
                    <td>' . $b . '</td>
                    <td>' . $rule[$i] . '</td>
                    <td>' . $nilZ[$i] . '</td>
                </tr>
                ';
    }
    $cetak = array( '                        
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <h6 class="card-header border-0">Hasil dari Rule</h6>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nilai Rule</th>
                        <th scope="col">Nilai Z</th>
                    </tr>
                    '. $tr[0] . $tr[1] . $tr[2] . $tr[3] .'
                </table>
            </div>
        </div>
    </div>');
    return $cetak;
}

function cetakHasil($hasil)
{
    $cetak = array ('                    
    <div class="my-3 row justify-content-center">
        <div class="col-lg-7">
            <div class="card">
                <h6 class="card-header bg-success text-white">Hasil akhir</h6>
                <div class="card-body">
                    <span>Jadi, jumlah produk yang perlu diproduksi adalah <span class="fw-bold text-success">' . $hasil . '</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="my-3 row justify-content-center"><div class="col-lg-9"><hr></div></div>');
    return $cetak;
}
