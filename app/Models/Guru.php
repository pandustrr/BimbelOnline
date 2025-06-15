<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Guru extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'guru';

    protected $fillable = [
        'nama_guru',
        'username',
        'email',
        'password',
        'no_hp',
        'riwayat_pendidikan',
        'alamat',
        'jenjang',
        'mata_pelajaran',
        'foto',
        'cv',
        'status',
        'alasan_penolakan'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $appends = [
        'foto_url',
        'cv_url',
        'status_text',
        'jenjang_text'
    ];

    public function jadwalTersedia()
    {
        return $this->hasMany(Jadwal::class)
            ->whereColumn('terdaftar', '<', 'kuota')
            ->orderBy('hari')
            ->orderBy('jam_mulai');
    }

    public function jadwalPenuh()
    {
        return $this->hasMany(Jadwal::class)
            ->whereColumn('terdaftar', '>=', 'kuota')
            ->orderBy('hari')
            ->orderBy('jam_mulai');
    }

    // Scope untuk filter status
    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function scopeDiterima($query)
    {
        return $query->where('status', 'diterima');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    // Scope untuk filter jenjang
    public function scopeJenjangSD($query)
    {
        return $query->where('jenjang', 'SD');
    }

    public function scopeJenjangSMP($query)
    {
        return $query->where('jenjang', 'SMP');
    }

    public function scopeJenjangSMA($query)
    {
        return $query->where('jenjang', 'SMA');
    }

    // Accessor untuk foto
    public function getFotoUrlAttribute()
    {
        return $this->foto ? Storage::url($this->foto) : asset('images/default-profile.png');
    }

    // Accessor untuk CV
    public function getCvUrlAttribute()
    {
        return $this->cv ? Storage::url($this->cv) : null;
    }

    // Accessor untuk jenjang
    public function getJenjangTextAttribute()
    {
        $jenjang = [
            'SD' => 'Sekolah Dasar (SD)',
            'SMP' => 'Sekolah Menengah Pertama (SMP)',
            'SMA' => 'Sekolah Menengah Atas (SMA)'
        ];

        return $jenjang[$this->jenjang] ?? $this->jenjang;
    }

    public function getStatusTextAttribute()
    {
        $statuses = [
            'menunggu' => 'Menunggu Persetujuan',
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak'
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
