<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notaris extends Model
{
    protected $table = 'notarises';
    
    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_telp',
        'user_id'
    ];
    
        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function akta()
    
    {
        return $this->hasMany(Akta::class, 'id_notaris');
    }
    public $incrementing = true;
    public $timestamps = true;
    protected $keyType = 'int';

}
