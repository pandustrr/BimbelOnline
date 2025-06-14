<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama_siswa', 'username', 'email', 'password',
        'no_hp', 'kelas', 'asal_sekolah', 'alamat'
    ];

    protected $hidden = ['password', 'remember_token'];
}
