<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Pengguna extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'tbl_pengguna';
    protected $primaryKey = 'ID_PENGGUNA';
    protected $fillable = [
        'ID_PENGGUNA',
        'NAMA',
        'USERNAME',
        'EMAIL',
        'PASSWORD',
        'NO_TELP',
        'ALAMAT',
        'ROLE',
        'TGL_DAFTAR'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'ID_PENGGUNA', 'ID_PENGGUNA');
    }

    public $timestamps = false;
}
