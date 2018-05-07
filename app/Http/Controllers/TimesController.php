<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function __construct()
    {

    }

    public function log_time(Request $request)
    {
        $rules = [
            'time_tracked' => ['required', 'integer'],
            'time_tracked_formatted' => ['required'],
            'description' => ['required'],
        ];

        $validator = $this->validate($request, $rules);
        if (isset($validator['errors'])) {
            return response()->json($validator->messages(), 200);
        }

        $time = new Time();
        $time->user_id = 1;
        $time->start_date = date('Y-m-d');
        $time->time_tracked = $request->time_tracked;
        $time->time_tracked_formatted = $request->time_tracked_formatted;
        $time->description = $request->description;
        $time->save();

        return json_encode([
            'success'   =>  true,
            'msg'       =>  'Time was successfully logged.'
        ]);
    }

    public function get_time(){
        return json_encode([
            "data" => Time::all(['id','start_date','time_tracked_formatted','description']);
        ]);
    }
}