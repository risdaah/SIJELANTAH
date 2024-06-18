<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insentif extends Model
{
    use HasFactory;

    protected $table = 'tbl_insentif';
    protected $primaryKey = 'ID_INSENTIF';
    protected $fillable = [
        'ID_INSENTIF',
        'ID_PERMINTAAN',
        'ID_PENGGUNA',
        'JUMLAH_INSENTIF',
        'STATUS',
    ];

    // Define the relationship with the Kumpul model
    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class, 'ID_PERMINTAAN');
    }

    // Define the relationship with the User model
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'ID_PENGGUNA');
    }

    public $timestamps = false;
}
