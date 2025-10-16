<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function showList()
    {

        return view('weight_logs');
    }
}
