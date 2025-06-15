<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Siswa extends Authenticatable
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama_siswa',
        'username',
        'email',
        'password',
        'no_hp',
        'jenjang',
        'kelas',
        'asal_sekolah',
        'alamat'
    ];

    protected $hidden = ['password'];

    // Relasi many-to-many dengan jadwal
    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_siswa')
            ->withPivot('status', 'tanggal_daftar')
            ->withTimestamps();
    }
}
