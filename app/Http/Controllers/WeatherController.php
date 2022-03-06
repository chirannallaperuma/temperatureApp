<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
        
    }

    public function index()
    {
        $user = Auth::user();
        $data = $user->temperatures();
        $data = $data->orderBy('temperature', 'ASC');
        $data = $data->get()->groupBy('city');
        return $data;
    }

    /**
     * hotteset first
     */
    public function hottest()
    {
        $user = Auth::user();
        $data = $user->temperatures();
        $data = $data->orderBy('temperature', 'DESC');
        $data = $data->get()->groupBy('city');
        return $data;
    }
}
