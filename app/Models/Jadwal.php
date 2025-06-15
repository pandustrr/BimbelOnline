<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $fillable = [
        'guru_id',
        'mata_pelajaran',
        'kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'kuota',
        'terdaftar'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'jadwal_siswa')
            ->withPivot('status', 'tanggal_daftar')
            ->withTimestamps();
    }
}
