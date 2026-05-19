<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $primaryKey = 'animal_id';

    protected $fillable = [
        'name',
        'species',
        'gender',
        'breed',
        'age',
        'height',
        'weight',
        'image',
        'status',
        'description',
        'registered_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'registered_by');
    }
}