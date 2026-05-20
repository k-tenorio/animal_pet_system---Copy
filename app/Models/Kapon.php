<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kapon extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'owner_name',
        'owner_email',
        'owner_mobile',
        'owner_address',
        'pet_name',
        'pet_species',
        'pet_gender',
        'pet_breed',
        'pet_age',
        'pet_weight',
        'pet_height',
        'pet_photo',
        'appointment_date',
        'procedure_type',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];
}
