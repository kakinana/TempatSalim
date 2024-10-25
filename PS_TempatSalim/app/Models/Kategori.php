<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'name_ct', 
        'detail_ct',
        'status_ct'
    ];

    public function gedung()
    {
        return $this->belongsToMany(Gedung::class, 'kategori_gedung', 'id_ct', 'id_gd');
    }
}
