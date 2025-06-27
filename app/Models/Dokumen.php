<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    protected $primaryKey = 'id_dokumen';
    protected $table = 'dokumens';

    protected $fillable = [
        'id_akta',
        'nama_file',
        'tipe_file',
        'path_file',
        'tanggal_upload',
        'user_id'
    ];

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function akta()
    {
        return $this->belongsTo(Akta::class, 'id_akta');
    }
}
