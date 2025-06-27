<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    protected $primaryKey = 'id_klien'; 
    protected $table = 'kliens'; 

    protected $fillable = [
        'nama',
        'nik',
        'email',
        'alamat',
        'no_telp'
    ];
}
