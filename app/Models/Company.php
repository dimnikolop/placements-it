<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'description',
        'sector',
        'address',
        'zip_code',
        'location',
        'website',
        'contact_person',
        'phone',
        'email',
        'notes',
        'facebook',
        'twitter',
        'linkedin'
        
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending',
    ];

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the jobs offered by the company.
     */
    public function jobs()
    {
        return $this->hasMany('App\Models\Job');
    }
}
