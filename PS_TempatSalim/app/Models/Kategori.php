<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_ct';
    protected $fillable = ['id_ct', 'name_ct', 'description', 'code_gd'];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class, 'code_gd', 'code_gd');
    }
}
