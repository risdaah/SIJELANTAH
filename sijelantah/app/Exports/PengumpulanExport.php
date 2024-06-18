<?php

namespace App\Exports;

use App\Models\Pengumpulan;
use App\Models\Insentif;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengumpulanExport implements FromCollection, WithMapping, WithHeadings
{
    protected $month;
    protected $year;

    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function collection()
    {
        // Base query
        $query = Pengumpulan::with('permintaan.pengguna');

        // Apply filter if month and year are provided
        if ($this->month && $this->year) {
            $query->whereMonth('TGL_KUMPUL', $this->month)
                ->whereYear('TGL_KUMPUL', $this->year);
        }

        return $query->get();
    }

    public function map($pengumpulan): array
    {
        $insentif = Insentif::where('ID_PERMINTAAN', $pengumpulan->ID_PERMINTAAN)->first();

        return [
            'ID_PERMINTAAN' => $pengumpulan->ID_PERMINTAAN,
            'NAMA' => $pengumpulan->permintaan->pengguna->NAMA,
            'NO_TELP' => $pengumpulan->permintaan->pengguna->NO_TELP,
            'JUMLAH_KIRIM' => $pengumpulan->JUMLAH_KIRIM,
            'ALAMAT_PERMINTAAN' => $pengumpulan->permintaan->ALAMAT_PERMINTAAN,
            'TGL_KUMPUL' => $pengumpulan->TGL_KUMPUL,
            'JUMLAH_INSENTIF' => $insentif ? $insentif->JUMLAH_INSENTIF : 0,
        ];
    }

    public function headings(): array
    {
        return [
            'ID Permintaan',
            'Nama Pengguna',
            'Nomor Telepon',
            'Jumlah Kirim',
            'Alamat Permintaan',
            'Tanggal Kumpul',
            'Jumlah Insentif',
        ];
    }
}
