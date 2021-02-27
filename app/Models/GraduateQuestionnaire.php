<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GraduateQuestionnaire extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the graduate that owns the questionnaire.
     */
    public function graduate()
    {
        return $this->belongsTo('App\Models\Graduate');
    }
}
