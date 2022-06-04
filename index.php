<?php
include 'function/post_fuzzy.php';

getData();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Aplikasi Fuzzy</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>Aplikasi Fuzzy</strong>
      </a>
    </div>
  </div>
</header>

<main>

  <section class="py-3 text-center container">
    <div class="row py-lg-3">
      <div class="col-lg-8 col-md-8 mx-auto">
        <h1 class="fw-light">Aplikasi Menentukan Jumlah Produk dengan Metode Tsukamoto</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p> -->
      </div>
    </div>
  </section>

  <div class="album">
    <div class="container">
        <div id="hasil">
            <?php if (isset($_POST['submit'])): ?>

                <!-- <h1>Test</h1> -->
            <?php endif;?>
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <h5 class="card-header bg-success text-white">Fungsi Keanggotaan</h5>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <td>Permintaan turun</td>
                                    <td><strong>123</strong></td>
                                </tr>
                                <tr>
                                    <td>Permintaan naik</td>
                                    <td><strong>123</strong></td>
                                </tr>
                                <tr>
                                    <td>Persediaan sedikit</td>
                                    <td><strong>123</strong></td>
                                </tr>
                                <tr>
                                    <td>Persediaan banyak</td>
                                    <td><strong>123</strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm">
                        <h5 class="card-header bg-success text-white">Hasil dari Rule</h5>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nilai Rule</th>
                                    <th scope="col">Nilai Z</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>123</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>123</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>123</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>123</td>
                                    <td>123</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 row justify-content-center">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            This is some text within a card body.
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <form action="" class="row justify-content-center" method="POST">
               <div class="col-lg-9">
               <div class="card shadow-sm">
                <h5 class="card-header">Variabel</h5>
                    <div class="card-body p-4">
                        <?php $label = array("Permintaan", "Persediaan", "Produksi");?>
                        <?php for ($i = 0; $i < 3; $i++): ?>
                        <div class="mb-3 row">
                            <div class="col">
                                <label for="v_min" class="form-label"><small><?=$label[$i]?> terendah</small></label>
                                <input type="text" class="form-control form-control-sm" value="<?=isset($_POST['submit']) ? $_POST['v_min' . $i] : ''?>" name="v_min<?=$i?>">
                            </div>
                            <div class="col">
                                <label for="v_max" class="form-label"><small><?=$label[$i]?> tertinggi</small></label>
                                <input type="text" class="form-control form-control-sm" value="<?=isset($_POST['submit']) ? $_POST['v_max' . $i] : ''?>" name="v_max<?=$i?>">
                            </div>
                        </div>
                        <?php endfor;?>

                    </div>
                </div>

                <div class="card shadow-sm mt-3">
                <h5 class="card-header">Ditanyakan</h5>
                    <div class="card-body p-4">
                        <div class="mb-3 row">
                            <?php for ($i = 0; $i < 2; $i++): ?>
                            <div class="col">
                                <label for="minta" class="form-label"><small><?=$label[$i]?></small></label>
                                <input type="text" class="form-control" name="nilai<?=$i?>">
                            </div>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
               </div>

               <div class="col-lg-10">
               <div class="card shadow-sm mt-3">
                <h5 class="card-header">Rule (Aturan Fuzzy Tsukamoto)</h5>
                    <div class="card-body p-4">
                        <?php for ($i = 0; $i < 4; $i++): ?>
                        <div class="mb-3 row">
                            <div class="col input-group pe-0">
                                <span class="input-group-text" id="basic-addon1">IF</span>
                                <select class="form-select form-select-sm" name="pmtrule<?=$i?>" aria-label=".form-select-sm example">
                                    <option value="0" selected>Permintaan turun</option>
                                    <option value="1">Permintaan naik</option>
                                </select>
                            </div>
                            <div class="col-2 pe-0">
                                <select class="form-select" name="oprule<?=$i?>" aria-label=".form-select-sm example">
                                    <option value="0" selected>AND</option>
                                    <option value="1">OR</option>
                                </select>
                            </div>
                            <div class="col input-group pe-0">
                                <select class="form-select form-select-sm" name="psdrule<?=$i?>" aria-label=".form-select-sm example">
                                    <option value="0" selected>Persediaan sedikit</option>
                                    <option value="1">Persediaan banyak</option>
                                </select>
                            </div>
                            <div class="col input-group">
                                <span class="input-group-text" id="basic-addon1">THEN</span>
                                <select class="form-select form-select-sm" name="pdkrule<?=$i?>" aria-label=".form-select-sm example">
                                    <option value="0" selected>Produksi berkurang</option>
                                    <option value="1">Produksi bertambah</option>
                                </select>
                            </div>
                        </div>

                        <?php endfor;?>
                    </div>
                </div>
               </div>

               <div class="mt-4 d-grid gap-2 col-4 mx-auto">
                   <button class="btn btn-success fw-bold" type="submit" id="btnsubmit" name="submit">H I T U N G</button>
                </div>
            </form>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="../getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
