<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    protected $fillable = [
        'barber_name'
    ];

    protected function casts(): array
    {
        return [
            'id',
            'barber_name'
        ];
    }
}
