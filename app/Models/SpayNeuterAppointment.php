<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpayNeuterAppointment extends Model
{
    protected $primaryKey = 'appointment_id';

    protected $fillable = [
        'user_id',
        'animal_id',
        'appointment_date',
        'procedure_type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'animal_id');
    }
}