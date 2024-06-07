<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tumpangan extends Model
{
    use HasFactory;
    protected $table = 'tumpangan';
    protected $fillable = ['id_siswa','id_penumpang','lat_penumpang','long_penumpang','lat_captain','long_captain','tgl_tumpangan','asal','tujuan','jam_berangkat','catatan'];
    public $timestamps = false;

    function Siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    function Penumpang(){
        return $this->belongsTo(Siswa::class, 'id_penumpang');
    }
    // function Penumpang(){
    //     return $this->belongsTo(Siswa::class, 'id_Penumpang');
    // }


    // public function DetailTumpangan(){
    //     return $this->hasOne(DetailTumpangan::class);
    // }
}
