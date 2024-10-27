<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPinjam extends Model
{
    use HasFactory;

    protected $table = 'daftar_pinjam';
    protected $primaryKey = 'id_rent';

    protected $fillable = [
        'id_user',
        'id_gd',
        'unit_rent',
        'date_rent',
        'date_rent'
    ];
}
