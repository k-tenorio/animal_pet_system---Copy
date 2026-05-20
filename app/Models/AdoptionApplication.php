<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionApplication extends Model
{
    protected $primaryKey = 'application_id';

    protected $fillable = [
        'user_id',
        'animal_id',
        'registered_by',
        'approved_by',
        'first_name',
        'last_name',
        'address',
        'contact_number',
        'birthdate',
        'civil_status',
        'gender',
        'owner_image',
        'zoom_interview_date',
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

    public function registeredBy()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
