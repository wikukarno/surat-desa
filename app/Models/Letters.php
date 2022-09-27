<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Letters extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'letters';
    protected $primaryKey = 'id';
    protected $fillable = [
        'users_id',
        'jenis_surat',
        'nama',
        'nama_usaha',
        'no_surat',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'pekerjaan',
        'rt_rw',
        'kelurahan',
        'kecamatan',
        'agama',
        'status_perkawinan',
        'no_nik',
        'posisi',
        'status',
        'status_proses',
        'alasan_penolakan',
        'foto_ktp',
        'foto_kk',
        'foto_surat_rt_rw',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
