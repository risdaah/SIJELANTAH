<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengumpulan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengumpulan';
    protected $primaryKey = 'ID_KUMPUL';
    protected $fillable = [
        'ID_KUMPUL',
        'ID_PERMINTAAN',
        'TGL_KUMPUL',
        'JUMLAH_KIRIM',
        'STATUS_PERMINTAAN'
    ];

    protected $dates = ['TGL_KUMPUL'];

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'ID_PERMINTAAN');
    }

    public function setTGLKumpulAttribute($value)
    {
        $this->attributes['TGL_KUMPUL'] = Carbon::parse($value);
    }

    public function getTGLKumpulAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public $timestamps = false;
}
