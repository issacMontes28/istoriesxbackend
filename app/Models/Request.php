<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'url',
        'status',
        'media_type'
    ];

    // Relación con el modelo Platform
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
