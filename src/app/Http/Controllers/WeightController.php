<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;

class WeightController extends Controller
{
    public function showWeightRegister()
    {
        return view('register_step2');
    }
    public function storeWeightRegister(Request $request)
    {
        $user = auth()->user();
        User::where('id', auth()->id())->update(['weight_register' => true]);

        $weight_register = $request->only(['target_weight']);
        $weight_register['user_id'] = $user->id;
        WeightTarget::create($weight_register);

        WeightLog::create([
            'user_id' => $user->id,
            'weight' => $request->input('weight'),
            'date' => now(),
        ]);

        return redirect('weight_logs');
    }

    public function showList()
    {
        $user_id = auth()->id();
        $weights = WeightLog::where('user_id', $user_id)->get();

        $weight_target = WeightTarget::where('user_id', $user_id)->get();

        return view('weight_logs', compact('weights', 'weight_target'));
    }

    public function create(Request $request)
    {
        $weights = $request->only('date', 'weight', 'calories', 'exercise_time', 'exercise_content');
        $weights['user_id'] = auth()->id();
        WeightLog::create($weights);

        return redirect('weight_logs');
    }

    public function detail($weightLogId)
    {
        $weight = WeightLog::find($weightLogId);

        return view('detail', compact('weight'));
    }

    public function update(Request $request, $weightLogId)
    {
        $weight = $request->only(['date', 'weight', 'calories', 'exercise_time', 'exercise_content']);
        WeightLog::find($weightLogId)->update($weight);

        return redirect('weight_logs');
    }

    public function destroy($weightLogId)
    {
        WeightLog::find($weightLogId)->delete();

        return redirect('weight_logs');
    }

    public function goal()
    {

        return view('goal_setting');
    }
    public function setting(Request $request)
    {
        $weight = $request->input();
        $user_id = auth()->id();
        $target = WeightTarget::where('user_id', $user_id)->update($weight);

        return redirect('weight_logs', compact('target'));
    }
}
