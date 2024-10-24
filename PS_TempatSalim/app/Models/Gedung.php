<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;

    protected $table = 'gedung';
    protected $primaryKey = 'id_gd';

    protected $fillable = [
        'name_gd',
        'code_gd',
        'price_gd',
        'stock_gd',
        'status_gd'
    ];
    public function kategori()
    {
        return $this->hasMany(Kategori::class, 'code_gd', 'code_gd');
    }
}
