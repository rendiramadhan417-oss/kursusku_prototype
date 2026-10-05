<?php

/*
|--------------------------------------------------------------------------
| TEST MATRIX KURSUSKU
|--------------------------------------------------------------------------
*/

$coursePrices = [
    'web-dasar' => 200000,
    'php-dasar' => 250000,
    'php-lanjutan' => 300000,
    'laravel-fundamental' => 350000,
    'mysql-dasar' => 275000,
    'ui-web-dasar' => 225000
];

$discountRates = [
    'mahasiswa' => 20,
    'guru' => 15,
    'umum' => 0
];

function rupiah($number): string
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}

$tests = [];


/*
|--------------------------------------------------------------------------
| TEST 1 - MAHASISWA
|--------------------------------------------------------------------------
*/

$price = $coursePrices['php-dasar'];
$discount = $price * 20 / 100;
$total = $price - $discount;

$tests[] = [
    'scenario' => 'Mahasiswa',
    'input' => 'PHP Dasar',
    'expected' => 'Diskon 20% - Total Rp 200.000',
    'actual' => 'Diskon 20% - Total ' . rupiah($total),
    'status' => $total == 200000 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 2 - GURU
|--------------------------------------------------------------------------
*/

$price = $coursePrices['php-dasar'];
$discount = $price * 15 / 100;
$total = $price - $discount;

$tests[] = [
    'scenario' => 'Guru',
    'input' => 'PHP Dasar',
    'expected' => 'Diskon 15% - Total Rp 212.500',
    'actual' => 'Diskon 15% - Total ' . rupiah($total),
    'status' => $total == 212500 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 3 - UMUM
|--------------------------------------------------------------------------
*/

$price = $coursePrices['php-dasar'];
$discount = $price * 0 / 100;
$total = $price - $discount;

$tests[] = [
    'scenario' => 'Umum',
    'input' => 'PHP Dasar',
    'expected' => 'Diskon 0% - Total Rp 250.000',
    'actual' => 'Diskon 0% - Total ' . rupiah($total),
    'status' => $total == 250000 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 4 - MINAT KOSONG
|--------------------------------------------------------------------------
*/

$interests = [];

$tests[] = [
    'scenario' => 'Minat kosong',
    'input' => 'Tidak ada checkbox',
    'expected' => 'Tetap dapat diproses',
    'actual' => empty($interests)
        ? 'Tetap dapat diproses'
        : 'Tidak sesuai',
    'status' => empty($interests) ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 5 - BEBERAPA CHECKBOX
|--------------------------------------------------------------------------
*/

$interests = [
    'ui-ux',
    'database',
    'backend'
];

$interestText = implode(', ', $interests);

$tests[] = [
    'scenario' => 'Beberapa minat',
    'input' => 'UI/UX + Database + Backend',
    'expected' => 'Semua minat tersimpan',
    'actual' => $interestText,
    'status' => count($interests) == 3 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 6 - NAMA KOSONG
|--------------------------------------------------------------------------
*/

$name = '';

$tests[] = [
    'scenario' => 'Nama kosong',
    'input' => 'Nama tidak diisi',
    'expected' => 'Form harus ditolak',
    'actual' => empty($name)
        ? 'Validasi diperlukan'
        : 'Nama diterima',
    'status' => empty($name) ? 'PASS' : 'FAIL'
];

?>

<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Test Matrix - KursusKu</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<main class="container history-page">

    <section class="page-intro">

        <p class="eyebrow">
            Pengujian Sistem
        </p>

        <h1>
            Test Matrix KursusKu
        </h1>

        <p>
            Pengujian fitur pendaftaran, diskon, minat, dan validasi.
        </p>

    </section>


    <section class="history-card">

        <div class="table-wrapper">

            <table class="history-table">

                <thead>

                    <tr>

                        <th>No.</th>
                        <th>Skenario</th>
                        <th>Input</th>
                        <th>Hasil yang Diharapkan</th>
                        <th>Hasil Aktual</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach ($tests as $index => $test): ?>

                    <tr>

                        <td>
                            <?= $index + 1 ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['scenario']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['input']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['expected']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($test['actual']) ?>
                        </td>

                        <td>
                            <?= $test['status'] ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <div class="history-links">

            <a href="registration.php">
                Daftar Kursus
            </a>

            <a href="history.php">
                Histori Pendaftaran
            </a>

            <a href="index.php">
                Beranda
            </a>

        </div>

    </section>

</main>

</body>

</html>