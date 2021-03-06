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
        'lat',
        'lng'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'pending'
    ];

    /**
     * Get the questionnaire associated with the graduate.
     */
    public function graduateQuestionnaire()
    {
        return $this->hasOne('App\Models\GraduateQuestionnaire');
    }

    /**
     * Get coordinates (lat,lng) to use on google map.
     * 
     * @param  string $address
     * @return array lat,lng
     */ 
    public static function getCoordinates($address) {
        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
        
		$apiKey = 'yourKey';
		
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$apiKey;
		
		$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        $response = curl_exec($ch);
        $response = json_decode($response, true);
        curl_close($ch);

        if ($response['status'] === "OK") {
            $lat = $response['results'][0]['geometry']['location']['lat'];
            $lng = $response['results'][0]['geometry']['location']['lng'];
    
            return [
                'lat' => $lat,
                'lng' => $lng
            ];
        }
        
        return false;
    }
}
