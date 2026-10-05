<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| DATA HISTORI PENDAFTARAN
|--------------------------------------------------------------------------
| Data ini merupakan data dummy untuk latihan
| array dan foreach.
|--------------------------------------------------------------------------
*/

$registrations = [
    [
        'name' => 'Rendy Risaldin Ramadhan',
        'course' => 'PHP Dasar',
        'total' => 200000
    ],

    [
        'name' => 'Erico Jianhua',
        'course' => 'Web Dasar',
        'total' => 150000
    ],

    [
        'name' => 'M. Hafiz',
        'course' => 'Laravel Fundamental',
        'total' => 300000
    ],

    [
        'name' => 'Naruto',
        'course' => 'PHP Dasar',
        'total' => 200000
    ],
];


/*
|--------------------------------------------------------------------------
| FORMAT RUPIAH
|--------------------------------------------------------------------------
*/

function formatRupiah($number): string
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}


/*
|--------------------------------------------------------------------------
| ESCAPE HTML
|--------------------------------------------------------------------------
*/

function e($value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

?>

<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>Histori Pendaftaran - KursusKu</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<main class="container histori-page">

    <section class="page-intro">

        <p class="eyebrow">
            HISTORI PENDAFTARAN
        </p>

        <h1>
            Histori Pendaftaran
        </h1>

        <p>
            Riwayat pendaftaran kursus KursusKu.
        </p>

    </section>


    <section class="histori-card">

        <div class="table-wrapper">

            <table class="histori-table">

                <thead>

                    <tr>

                        <th>No.</th>

                        <th>Nama</th>

                        <th>Kursus</th>

                        <th>Total</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($registrations as $index => $item): ?>

                        <tr>

                            <td>
                                <?= $index + 1 ?>
                            </td>

                            <td>
                                <?= e($item['name']) ?>
                            </td>

                            <td>
                                <?= e($item['course']) ?>
                            </td>

                            <td>
                                <?= formatRupiah($item['total']) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>


        <div class="histori-links">

            <a href="registration.php">
                Daftar Kursus
            </a>

            <a href="index.php">
                Beranda
            </a>

        </div>

    </section>

</main>

</body>

</html>