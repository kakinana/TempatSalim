<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Kategori_Gedung extends Pivot
{
    use HasFactory;
    protected $table = 'kategori_gedung';
    protected $primaryKey = ['id_gd', 'id_ct'];
}
