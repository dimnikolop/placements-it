<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'surname',
        'name',
        'father_name',
        'graduation_year',
        'diploma',
        'phone',
        'email',
        'website',
        'job',
        'employer',
        'work_address',
        'postal_code',
        'city',
        'notes',
        'map',
        'latitude',
        'longitude'   
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending'
    ];
}
