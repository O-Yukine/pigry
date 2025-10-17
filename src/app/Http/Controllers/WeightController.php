<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function showList()
    {
        $user_id = auth()->id();
        $weight = WeightLog::where('user_id', $user_id)->get();

        return view('weight_logs', compact('weight'));
    }

    public function create(Request $request)
    {
        $weights = $request->only('date', 'weight', 'calories', 'exercise_time', 'exercise_content');
        $weights['user_id'] = auth()->id();
        WeightLog::create($weights);

        return redirect('weight_logs');
    }
}
