<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdoptionApplication extends Model
{
    protected $primaryKey = 'application_id';

    protected $fillable = [
        'user_id',
        'animal_id',

        // STAFF
        'registered_by',

        // ADMIN
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

        // PAYMENT
        'adoption_fee',
        'payment_status',

        // STATUS
        'status',
    ];

    // ADOPTER
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // PET
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'animal_id');
    }

    // STAFF WHO APPROVED FIRST
    public function registeredBy()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }

    // ADMIN WHO FINAL APPROVED
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
