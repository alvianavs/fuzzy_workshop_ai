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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
                <div class="col-lg-8 mx-auto">
                    <h1 class="fw-light">Aplikasi Menentukan Jumlah Produk dengan Metode Tsukamoto</h1>
                </div>
                <div class="col-lg-10 mx-auto">
                    <p class="lead text-muted">Setiap konsekuen (kesimpulan) pada setiap aturan IF‐THEN harus direpresentasikan dengan suatu himpunan fuzzy dengan fungsi keanggotaan monoton. Hasilnya, output hasil inferensi dari setiap aturan diberikan secara tegas (crisp) berdasarkan a‐predikat, kemudian menghitung rata‐rata terbobot.</p>
                </div>
            </div>
        </section>

        <div class="album">
            <div class="container">
                <form action="function/main.php" class="row justify-content-center" method="POST">
                    <div class="col-lg-9">
                        <div class="card shadow-sm">
                            <h5 class="card-header">Variabel</h5>
                            <div class="card-body p-4">
                                <?php $label = array("Permintaan", "Persediaan", "Produksi"); ?>
                                <?php for ($i = 0; $i < 3; $i++) : ?>
                                    <div class="mb-3 row">
                                        <div class="col">
                                            <label for="v_min" class="form-label d-flex justify-content-between"><small><?= $label[$i] ?> terendah</small><small class="fst-italic text-danger" id="v_min<?= $i ?>"></small></label>
                                            <input type="text" class="form-control form-control-sm" value="<?= isset($_POST['submit']) ? $_POST['v_min' . $i] : '' ?>" name="v_min<?= $i ?>">
                                        </div>
                                        <div class="col">
                                            <label for="v_max" class="form-label d-flex justify-content-between"><small><?= $label[$i] ?> tertinggi</small><small class="fst-italic text-danger" id="v_max<?= $i ?>"></small></label>
                                            <input type="text" class="form-control form-control-sm" value="<?= isset($_POST['submit']) ? $_POST['v_max' . $i] : '' ?>" name="v_max<?= $i ?>">
                                        </div>
                                    </div>
                                <?php endfor; ?>

                            </div>
                        </div>

                        <div class="card shadow-sm mt-3">
                            <h5 class="card-header">Ditanyakan</h5>
                            <div class="card-body p-4">
                                <div class="mb-3 row">
                                    <?php for ($i = 0; $i < 2; $i++) : ?>
                                        <div class="col">
                                            <label for="minta" class="form-label d-flex justify-content-between"><small><?= $label[$i] ?></small><small class="fst-italic text-danger" id="nilai<?= $i ?>"></small></label>
                                            <input type="text" class="form-control" value="<?= isset($_POST['submit']) ? $_POST['nilai' . $i] : '' ?>" name="nilai<?= $i ?>">
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="card shadow-sm mt-3">
                            <h5 class="card-header">Rule (Aturan Fuzzy Tsukamoto)</h5>
                            <div class="card-body p-4">
                                <?php for ($i = 0; $i < 4; $i++) : ?>
                                    <div class="mb-3 row">
                                        <div class="col input-group pe-0">
                                            <span class="input-group-text" id="basic-addon1">IF</span>
                                            <select class="form-select form-select-sm" name="pmtrule<?= $i ?>" aria-label=".form-select-sm example">
                                            <?php if($_POST['pmtrule'.$i] == 0) : ?>
                                                <option value="0" selected>Permintaan turun</option>
                                                <option value="1">Permintaan naik</option>
                                            <?php elseif($_POST['pmtrule'.$i] == 1) : ?>
                                                <option value="0">Permintaan turun</option>
                                                <option value="1" selected>Permintaan naik</option>
                                            <?php else : ?>
                                                <option value="0" selected>Permintaan turun</option>
                                                <option value="1">Permintaan naik</option>
                                            <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col-2 pe-0">
                                            <select class="form-select" name="oprule<?= $i ?>" aria-label=".form-select-sm example">
                                            <?php if($_POST['oprule'.$i] == 0) : ?>
                                                <option value="0" selected>AND</option>
                                                <option value="1">OR</option>
                                            <?php elseif($_POST['oprule'.$i] == 1) : ?>
                                                <option value="0">AND</option>
                                                <option value="1" selected>OR</option>
                                            <?php else: ?>
                                                <option value="0" selected>AND</option>
                                                <option value="1">OR</option>
                                            <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col input-group pe-0">
                                            <select class="form-select form-select-sm" name="psdrule<?= $i ?>" aria-label=".form-select-sm example">
                                            <?php if($_POST['psdrule'.$i] == 0) : ?>
                                                <option value="0" selected>Persediaan sedikit</option>
                                                <option value="1">Persediaan banyak</option>
                                            <?php elseif($_POST['psdrule'.$i] == 1) : ?>
                                                <option value="0">Persediaan sedikit</option>
                                                <option value="1" selected>Persediaan banyak</option>
                                            <?php else: ?>
                                                <option value="0" selected>Persediaan sedikit</option>
                                                <option value="1">Persediaan banyak</option>
                                            <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="col input-group">
                                            <span class="input-group-text" id="basic-addon1">THEN</span>
                                            <select class="form-select form-select-sm" name="pdkrule<?= $i ?>" aria-label=".form-select-sm example">
                                                <option value="0" selected>Produksi berkurang</option>
                                                <option value="1">Produksi bertambah</option>
                                            </select>
                                        </div>
                                    </div>

                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-grid gap-2 col-4 mx-auto">
                        <button class="btn btn-success fw-bold" type="submit" id="btnsubmit" name="submit">H I T U N G</button>
                    </div>
                </form>
                <div class="card my-5">
                    <div class="card-body">
                        <h5 class="card-title">Hasil perhitungan: </h5>
                        <div id="hasil" class="mt-3 row justify-content-center"></div>
                    </div>
                </div>                
            </div>
        </div>

    </main>

    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <i class="bi bi-house-fill fs-4"></i>
                </a>
                <span class="mb-3 mb-md-0 text-muted">&copy; 2022 Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex fs-4">
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-twitter"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-instagram"></i></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-facebook"></i></a></li>
            </ul>
        </footer>
    </div>

    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $("form").submit(function (event) {
                $.ajax({
                    type: "POST",
                    url: "function/main.php",
                    data: $(this).serialize(),
                    dataType: "json",
                    encode: true,
                }).done(function (data) {
                    console.log(data);
                    if (!data.success) {
                        showErrors(data);
                    } else {
                        $('#hasil').append(data.cetak_keanggotaan, data.cetak_rule, data.cetak_hasil);
                    }
                });
                event.preventDefault();
            });
        });

        function showErrors(data) {
            if (data.errors.v_min0) {
                $('#v_min0').html(data.errors.v_min0);
            } else {
                $('#v_min0').html('');
            }
            if (data.errors.v_min1) {
                $('#v_min1').html(data.errors.v_min1);
            } else {
                $('#v_min1').html('');
            }
            if (data.errors.v_min2) {
                $('#v_min2').html(data.errors.v_min2);
            } else {
                $('#v_min2').html('');
            }
            if (data.errors.v_max0) {
                $('#v_max0').html(data.errors.v_max0);
            } else {
                $('#v_max0').html('');
            }
            if (data.errors.v_max1) {
                $('#v_max1').html(data.errors.v_max1);
            } else {
                $('#v_max1').html('');
            }
            if (data.errors.v_max2) {
                $('#v_max2').html(data.errors.v_max2);
            } else {
                $('#v_max2').html('');
            }
            if (data.errors.nilai0) {
                $('#nilai0').html(data.errors.nilai0);
            } else {
                $('#nilai0').html('');
            }
            if (data.errors.nilai1) {
                $('#nilai1').html(data.errors.nilai1);
            } else {
                $('#nilai1').html('');
            }

            $('html, body').animate({
                scrollTop: $("form").offset().top
            }, 100);
        }
    </script>
</body>

</html>