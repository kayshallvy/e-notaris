<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Akta extends Model
{
    protected $primaryKey = 'id_akta';
    protected $table = 'aktas';

    protected $fillable = [
        'id_notaris',
        'nomor_akta',
        'jenis_akta',
        'tanggal_dibuat',
        'keterangan',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function notaris()
    {
        return $this->belongsTo(Notaris::class, 'id_notaris');
    }

    public function dokumen()
    {
        return $this->hasMany(Dokumen::class, 'id_akta');
    }

    public function klien()
    {
        return $this->belongsToMany(Klien::class, 'akta_kliens', 'id_akta', 'id_klien')
                    ->withPivot('peran')
                    ->withTimestamps();
    }
}
