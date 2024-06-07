<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens ,HasFactory, Notifiable;
    protected $table = 'siswa';
    protected $fillable = ['nisn',' nis','nik','nama','foto','kota_lahir','tgl_lahir','gender','alamat','telp','no_sim','nopol','merk','warna','password'];
    public $timestamps = false;

    public function Tumpangan(){
        return $this->hasOne(Tumpangan::class);
    }

    // public function DetailTumpangan(){
    //     return $this->hasOne(DetailTumpangan::class);
    // }
}
