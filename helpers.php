<?php
function rupiah(int $amount): string {
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function statusKursus(int $quota, int $registered): string {
    return $registered >= $quota ? 'Penuh' : 'Tersedia';
}

function sisaKursi(int $quota, int $registered): int {
    return max(0, $quota - $registered);
}

function formatTanggal(string $date): string {
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}

function findCourse(array $courses, string $courseCode): ?array
{
    foreach ($courses as $course) {
        if (($course['code'] ?? '') === $courseCode) {
            return $course;
        }
    }

    return null;
}

function getDiscountPercent(string $participantType): int
{
    return match ($participantType) {
        'mahasiswa' => 10,
        'guru' => 5,
        default => 0,
    };
}

function getLearningModeLabel(string $learningMode): string
{
    return match ($learningMode) {
        'offline' => 'Offline',
        'online' => 'Online',
        'hybrid' => 'Hybrid',
        default => 'Tidak diketahui',
    };
}

function formatRupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
