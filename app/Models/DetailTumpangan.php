<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTumpangan extends Model
{
    use HasFactory;
    protected $table = 'detail_tumpangan';
    protected $fillable = ['id_siswa','id_tumpangan', 'status'];
    public $timestamps = false;

    function Siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    function Tumpangan(){
        return $this->belongsTo(DetailTumpangan::class, 'id_tumpangan');
    }
}
