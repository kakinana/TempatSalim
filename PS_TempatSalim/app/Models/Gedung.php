<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name_gd',
        'code_gd',
        'price_gd',
        'stock_gd',
    ];
    public function kategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategori_gedung', 'id_gd', 'id_ct')->using(Kategori_Gedung::class);
    }
}

