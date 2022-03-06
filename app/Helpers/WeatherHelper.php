<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;

class WeatherHelper{

    public function __construct()
    {
        $this->apiKey = env('WEATHER_API_KEY');

    }

    public function getWeather($id)
    {
        try {
            $response = Http::get('http://api.openweathermap.org/data/2.5/weather', [
                'id' => $id,
                'appid' => $this->apiKey,
            ]);

            if ($response->successful()) {
                return json_decode($response->getBody());
            } else {
                $response->throw();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getTemperature($id)
    {
        try {
            $weather = $this->getWeather($id);
            $temperature = $weather->main->temp;

            return $temperature;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getCityName($cityId)
    {
        try {
            $city = $this->getWeather($cityId);
            $name = $city->name;

            return $name;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}