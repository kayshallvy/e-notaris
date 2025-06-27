<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AktaKlien extends Model
{
    protected $table = 'akta_kliens';
    protected $primaryKey = 'id_akta_klien';
    public $incrementing = true;

    protected $fillable = [
        'id_akta',
        'id_klien',
        'peran'
    ];

    public function akta()
    {
        return $this->belongsTo(Akta::class, 'id_akta');
    }

    public function klien()
    {
        return $this->belongsTo(Klien::class, 'id_klien');
    }
}
