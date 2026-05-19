<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $primaryKey = 'adoption_id';

    protected $table = 'adoption';

    protected $fillable = [
        'application_id',
        'user_id',
        'adoption_fee',
        'adopted_date',
    ];

    public function application()
    {
        return $this->belongsTo(AdoptionApplication::class, 'application_id', 'application_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}