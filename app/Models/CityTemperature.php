<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityTemperature extends Model
{
    use HasFactory;

    protected $fillable = ['city_id','city','user_id','temperature'];

    public static function cities(){
        return [
            0 => [
                'id' => 1248991,
                'name' => 'Colombo',
            ],
            1 => [
                'id' => 2147714,
                'name' => 'Sydney',
            ],
        ];
    }

    public const FACTOR = 273.15;

    protected $appends = [
        'date',
        'fahrenheit',
        'celsius',
    ];

    public function getDateAttribute()
    {
        return $this->created_at->format('D, j F Y, h:i a');
    }

    public function getFahrenheitAttribute()
    {
        $value = ($this->temperature - self::FACTOR) * 9 / 5 + 32;
        return number_format($value);
    }

    public function getCelsiusAttribute()
    {
        $value = $this->temperature - self::FACTOR;
        return number_format($value);
    }
}
