<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'file_path',
        'media_type',
        'size',
        'expires_at'
    ];

    // Relación con el modelo Request
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
