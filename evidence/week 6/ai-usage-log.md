# AI Usage Log --- KursusKu

## Identitas Proyek

-   **Nama proyek:** KursusKu
-   **Jenis proyek:** Website pendaftaran kursus berbasis PHP
-   **Teknologi:** PHP, HTML, CSS
-   **Dokumentasi:** Catatan penggunaan AI selama pengembangan website

## Tujuan Penggunaan AI

AI digunakan sebagai pendamping dalam proses pengembangan website
KursusKu, terutama untuk membantu memahami kode PHP/HTML/CSS,
memperbaiki kesalahan, dan mengembangkan fitur sesuai instruksi
praktikum.

## Riwayat Penggunaan AI

### 1. Membuat dan memperbaiki halaman registration.php

AI membantu menyusun struktur halaman pendaftaran yang berisi:

-   Nama lengkap
-   Email
-   Nomor HP
-   Program studi
-   Pilihan kursus
-   Jenis peserta
-   Minat tambahan
-   Catatan
-   Tombol pengiriman pendaftaran

Form menggunakan:

``` php
<form action="process-registration.php" method="POST">
```

### 2. Menambahkan jenis peserta

AI membantu menambahkan tiga pilihan jenis peserta menggunakan radio
button:

-   Mahasiswa
-   Guru
-   Umum

Contoh:

``` html
<input type="radio" name="participant_type" value="mahasiswa">
<input type="radio" name="participant_type" value="guru">
<input type="radio" name="participant_type" value="umum">
```

### 3. Membuat daftar kursus menggunakan array dan foreach

Sesuai langkah praktikum, daftar kursus tidak lagi ditulis dengan banyak
`<option>` secara manual.

Daftar kursus disimpan dalam array:

``` php
$courses = [
    'web-dasar' => 'Web Dasar',
    'php-dasar' => 'PHP Dasar',
    'php-lanjutan' => 'PHP Lanjutan',
    'laravel-fundamental' => 'Laravel Fundamental',
    'mysql-dasar' => 'MySQL Dasar',
    'ui-web-dasar' => 'UI WEB Dasar'
];
```

Kemudian option dibuat menggunakan looping:

``` php
<?php foreach ($courses as $value => $courseName): ?>
    <option value="<?= e($value) ?>">
        <?= e($courseName) ?>
    </option>
<?php endforeach; ?>
```

Hal ini memenuhi kebutuhan praktikum untuk membuat daftar kursus
menggunakan array dan looping.

### 4. Menambahkan harga kursus

AI membantu membuat array harga kursus di `process-registration.php`:

``` php
$coursePrices = [
    'web-dasar' => 200000,
    'php-dasar' => 250000,
    'php-lanjutan' => 300000,
    'laravel-fundamental' => 350000,
    'mysql-dasar' => 275000,
    'ui-web-dasar' => 225000
];
```

### 5. Menambahkan diskon berdasarkan jenis peserta

AI membantu membuat aturan diskon:

-   Mahasiswa: 20%
-   Guru: 15%
-   Umum: 0%

Kode yang digunakan:

``` php
$discountRates = [
    'mahasiswa' => 20,
    'guru' => 15,
    'umum' => 0
];
```

Perhitungan dilakukan dengan:

``` php
$discountAmount = $coursePrice * ($discountRate / 100);
$totalCost = $coursePrice - $discountAmount;
```

### 6. Membuat Ringkasan Biaya

AI membantu menambahkan bagian **Ringkasan Biaya** pada halaman
`process-registration.php`.

Informasi yang ditampilkan:

-   Harga Kursus
-   Jenis Peserta
-   Diskon
-   Jumlah Diskon
-   Total Biaya

Contoh perhitungan:

``` text
Harga Kursus  : Rp 275.000
Jenis Peserta : Guru
Diskon        : 15%
Jumlah Diskon : Rp 41.250
Total Biaya   : Rp 233.750
```

Bagian Ringkasan Biaya juga disesuaikan dengan desain website
hitam-merah-coklat menggunakan CSS yang sudah digunakan oleh website.

### 7. Menambahkan navigasi History

AI membantu menambahkan akses menuju `history.php` melalui navigasi
website.

Link yang digunakan:

``` html
<a href="history.php">History</a>
```

Pada halaman hasil pendaftaran juga dapat ditambahkan tombol:

``` html
<a class="btn-link" href="history.php">
    Lihat History
</a>
```

## Peran AI

AI digunakan sebagai:

1.  Pendamping pemrograman.
2.  Pemberi contoh struktur kode.
3.  Pembantu mencari dan memperbaiki kesalahan sintaks.
4.  Pembantu menjelaskan fungsi kode PHP, HTML, dan CSS.
5.  Pembantu mengembangkan fitur sesuai langkah praktikum.
6.  Pembantu menyesuaikan tampilan fitur baru dengan desain website yang
    sudah ada.

## Peran Pengembang

Pengembang tetap melakukan:

-   Menentukan fitur yang diperlukan.
-   Menentukan data kursus dan harga.
-   Menentukan persentase diskon.
-   Menyalin dan menerapkan kode ke proyek.
-   Menjalankan website.
-   Menguji hasil pada browser.
-   Memastikan hasil sesuai dengan kebutuhan praktikum.

## Catatan

AI digunakan sebagai alat bantu pengembangan, bukan sebagai pengganti
proses pemahaman dan pengujian kode. Setiap kode yang diberikan AI tetap
diperiksa dan diuji pada proyek KursusKu sebelum digunakan.

## Fitur yang Telah Dibantu AI

-   [x] Form pendaftaran kursus
-   [x] Jenis peserta Mahasiswa/Guru/Umum
-   [x] Daftar kursus menggunakan array dan `foreach`
-   [x] Harga kursus
-   [x] Diskon berdasarkan jenis peserta
-   [x] Perhitungan total biaya
-   [x] Ringkasan biaya
-   [x] Penyesuaian desain CSS
-   [x] Navigasi menuju History Dummy
