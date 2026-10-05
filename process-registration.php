<?php

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');

$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';

$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$source = $_POST['source'] ?? '';

$interestText = implode(', ', $interests);


/*
|--------------------------------------------------------------------------
| HARGA KURSUS
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


/*
|--------------------------------------------------------------------------
| NAMA KURSUS
|--------------------------------------------------------------------------
*/

$courseNames = [
    'web-dasar' => 'Web Dasar',
    'php-dasar' => 'PHP Dasar',
    'php-lanjutan' => 'PHP Lanjutan',
    'laravel-fundamental' => 'Laravel Fundamental',
    'mysql-dasar' => 'MySQL Dasar',
    'ui-web-dasar' => 'UI WEB Dasar'
];


/*
|--------------------------------------------------------------------------
| MENGAMBIL HARGA DAN NAMA KURSUS
|--------------------------------------------------------------------------
*/

$coursePrice = $coursePrices[$course] ?? 0;

$courseName = $courseNames[$course] ?? 'Kursus Tidak Diketahui';


/*
|--------------------------------------------------------------------------
| DISKON BERDASARKAN JENIS PESERTA
|--------------------------------------------------------------------------
*/

$discountRates = [
    'mahasiswa' => 20,
    'guru' => 15,
    'umum' => 0
];

$discountRate = $discountRates[$participantType] ?? 0;


/*
|--------------------------------------------------------------------------
| NAMA JENIS PESERTA
|--------------------------------------------------------------------------
*/

$participantNames = [
    'mahasiswa' => 'Mahasiswa',
    'guru' => 'Guru',
    'umum' => 'Umum'
];

$participantName = $participantNames[$participantType] ?? 'Tidak Diketahui';


/*
|--------------------------------------------------------------------------
| PERHITUNGAN BIAYA
|--------------------------------------------------------------------------
*/

$discountAmount = $coursePrice * ($discountRate / 100);

$totalCost = $coursePrice - $discountAmount;


/*
|--------------------------------------------------------------------------
| FORMAT RUPIAH
|--------------------------------------------------------------------------
*/

function rupiah($number): string
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
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>

<!doctype html>

<html lang="id">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Hasil Pendaftaran - KursusKu</title>

  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<main class="container result-page">


  <!-- =====================================================
       NOTIFIKASI PENDAFTARAN
       ===================================================== -->

  <section class="alert-success">

    <h1>Pendaftaran Diterima untuk Diproses</h1>

    <p>
      Periksa kembali data latihan berikut.
    </p>

  </section>


  <!-- =====================================================
       DATA PENDAFTAR
       ===================================================== -->

  <section class="summary-card">

    <dl class="summary-list">

      <dt>Nama</dt>
      <dd><?= e($name) ?></dd>


      <dt>Email</dt>
      <dd><?= e($email) ?></dd>


      <dt>Nomor HP</dt>
      <dd><?= e($phone) ?></dd>


      <dt>Program Studi</dt>
      <dd><?= e($studyProgram) ?></dd>


      <dt>Kursus</dt>
      <dd><?= e($courseName) ?></dd>


      <dt>Jenis Peserta</dt>
      <dd><?= e($participantName) ?></dd>


      <dt>Minat</dt>
      <dd><?= e($interestText ?: '-') ?></dd>


      <dt>Catatan</dt>
      <dd><?= e($note ?: '-') ?></dd>


      <dt>Sumber</dt>
      <dd><?= e($source) ?></dd>

    </dl>


    <a class="btn-link" href="registration.php">
      Kembali ke Form
    </a>
  </section>


  <!-- =====================================================
       RINGKASAN BIAYA
       ===================================================== -->

  <section class="cost-summary">

    <h2>Ringkasan Biaya</h2>


    <!-- Harga Kursus -->

    <div class="cost-row">

      <strong>Harga Kursus</strong>

      <span>
        <?= rupiah($coursePrice) ?>
      </span>

    </div>


    <!-- Jenis Peserta -->

    <div class="cost-row">

      <strong>Jenis Peserta</strong>

      <span>
        <?= e($participantName) ?>
      </span>

    </div>


    <!-- Diskon -->

    <div class="cost-row">

      <strong>Diskon</strong>

      <span>
        <?= $discountRate ?>%
      </span>

    </div>


    <!-- Jumlah Diskon -->

    <div class="cost-row">

      <strong>Jumlah Diskon</strong>

      <span>
        <?= rupiah($discountAmount) ?>
      </span>

    </div>


    <!-- Total Biaya -->

    <div class="cost-row total">

      <strong>Total Biaya</strong>

      <span>
        <?= rupiah($totalCost) ?>
      </span>

    </div>

  </section>


</main>

</body>

</html>