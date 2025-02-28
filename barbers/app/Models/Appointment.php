<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name',
        'barber_id',
        'appointment'
    ];

    protected function casts(): array
    {
        return [
            'id',
            'name',
            'barber_id',
            'appointment'
        ];
    }
    public function Appointments() {
        return $this->belongsTo(Barber::class);
    }
}
