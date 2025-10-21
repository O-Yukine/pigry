<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Http\Request;
use App\Http\Requests\CreateWeightLogsRequest;
use App\Http\Requests\GoalSettingRequest;
use App\Http\Requests\RegisterStep2Request;

class WeightController extends Controller
{
    public function showWeightRegister()
    {
        return view('register_step2');
    }
    public function storeWeightRegister(RegisterStep2Request $request)
    {

        $user = auth()->user();
        // User::where('id', auth()->id())->update(['weight_register' => true]);
        $weight_register = $request->only(['target_weight']);
        $weight_register['user_id'] = $user->id;
        WeightTarget::create($weight_register);

        WeightLog::create([
            'user_id' => $user->id,
            'weight' => $request->input('weight'),
            'date' => now(),
        ]);

        return redirect('/weight_logs');
    }

    public function showList()
    {
        // $user_id = auth()->id();
        // $weight_target = WeightTarget::where('user_id', $user_id)->get();

        // return view('weight_logs', compact('weights', 'weight_target'));

        $user = auth()->user();
        $weight_target = $user->weightTarget;
        $weights = WeightLog::where('user_id', $user->id)->paginate(8);

        $latest_weight = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->first();


        $remaining = null;
        if ($weight_target && $latest_weight) {
            $remaining = $latest_weight->weight - $weight_target->target_weight;
        }

        return view('weight_logs', compact('weight_target', 'weights', 'latest_weight', 'remaining'));
    }

    public function search(Request $request)
    {
        $user = auth()->user();

        $date_from = $request->input('from');
        $date_until = $request->input('until');

        // dd($date_from, $date_until);

        $weights = WeightLog::where('user_id', $user->id)
            ->when($date_from && $date_until, function ($query) use ($date_from, $date_until) {
                $query->whereBetween('date', [$date_from, $date_until]);
            })->orderBy('date', 'asc')->paginate(8);

        $counts = $weights->total();

        $weight_target = $user->weightTarget;
        $current_weights = WeightLog::where('user_id', $user->id)->get();
        $latest_weight = WeightLog::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->first();

        $remaining = null;
        if ($weight_target && $latest_weight) {
            $remaining = $latest_weight->weight - $weight_target->target_weight;
        }
        return view('weight_logs', compact('weight_target', 'weights', 'counts', 'latest_weight', 'remaining'));
    }


    public function create(CreateWeightLogsRequest $request)
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


    public function update(CreateWeightLogsRequest $request, $weightLogId)
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

    public function showTargetWeight()
    {
        $user = auth()->user();
        $target_weight = $user->weightTarget;

        return view('goal_setting', compact('target_weight'));
    }

    public function updateTargetWeight(GoalSettingRequest $request)
    {
        $user_id = auth()->id();

        WeightTarget::where('user_id', $user_id)->update([
            'target_weight' => $request->input('target_weight')
        ]);

        return redirect('weight_logs');
    }
}
