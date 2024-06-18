<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_permintaan';
    protected $primaryKey = 'ID_PERMINTAAN';
    protected $fillable = [
        'ID_PERMINTAAN',
        'ID_PENGGUNA',
        'ID_KUMPUL',
        'ID_INSENTIF',
        'TGL_MINTA',
        'TGL_KUMPUL',
        'KATEGORI',
        'ALAMAT_PERMINTAAN',
        'JUMLAH_KIRIM',
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'ID_PENGGUNA');
    }

    public function pengumpulan()
    {
        return $this->belongsTo(Pengumpulan::class, 'ID_KUMPUL');
    }

    public function insentif()
    {
        return $this->belongsTo(Insentif::class, 'ID_INSENTIF');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($permintaan) {
            // Buat data baru di tbl_pengumpulan
            $pengumpulan = Pengumpulan::create([
                'ID_PERMINTAAN' => $permintaan->ID_PERMINTAAN,
                'TGL_KUMPUL' => $permintaan->TGL_KUMPUL,
                'JUMLAH_KIRIM' => $permintaan->JUMLAH_KIRIM,
                'STATUS_PERMINTAAN' => 'Menunggu',
                // isi data lainnya
            ]);

            // Hitung insentif berdasarkan jumlah_kirim
            $insentif_jumlah = $permintaan->JUMLAH_KIRIM * 7000;

            // Buat data baru di tbl_insentif
            $insentif = Insentif::create([
                'ID_PERMINTAAN' => $permintaan->ID_PERMINTAAN,
                'ID_PENGGUNA' => $permintaan->ID_PENGGUNA,
                'JUMLAH_INSENTIF' => $insentif_jumlah,
                'STATUS' => 'Belum Terbayar',
                // isi data lainnya
            ]);


            $permintaan->ID_KUMPUL = $pengumpulan->ID_KUMPUL;
            $permintaan->ID_INSENTIF = $insentif->ID_INSENTIF;
            $permintaan->save();
        });
    }


    public $timestamps = false;
}